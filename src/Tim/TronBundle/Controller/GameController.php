<?php

namespace Tim\TronBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Tim\TronBundle\Entity\Game;

class GameController extends Controller
{
  public function indexAction()
  {
    if (!$this->get('security.context')->isGranted('ROLE_JOUEUR')) {
      // on déclenche une exception « Accès interdit »
      throw new AccessDeniedHttpException('Accès limité aux Joueurs');
    }

    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('TimTronBundle:Game');

    $games = $repository->findAll();
    $user = $this->getUser();

    $user_games1 = $repository->findBy(
      array('j1' => $user)
    );

    $user_games2 = $repository->findBy(
      array('j2' => $user)
    );

    $user->addGames(array_merge($user_games1, $user_games2));

    return $this->render(
      'TimTronBundle:Game:index.html.twig',
      [
        "games" => $games,
        "user" => $user
      ]
    );
  }

  public function createAction(){
    $game = new Game;
    $user = $this->getUser();

    $game->setJ1($user);
    $user->addGame($game);

    $em = $this->getDoctrine()->getManager();
    $em->persist($game);
    $em->flush();

    return $this->redirect($this->generateUrl('tim_tron_game'));
  }

  public function runAction($id){

    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('TimTronBundle:Game');

    $game = $repository->find($id);
    if (!$game) {
      throw $this->createNotFoundException('Le jeux n\'existe pas');
    }

    $user = $this->getUser();
    if(!$game->can_play($user)){
      throw $this->createNotFoundException("Vous n'avez pas le droit d'accéder à cette partie !");
    }

    return $this->render(
      'TimTronBundle:Game:run.html.twig',
      [
        "game" => $game,
        "user" => $user
      ]
    );
  }
}
