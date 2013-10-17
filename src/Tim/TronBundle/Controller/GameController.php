<?php

namespace Tim\TronBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class GameController extends Controller
{
  public function indexAction()
  {
    if (!$this->get('security.context')->isGranted('ROLE_JOUEUR')) {
      // on déclenche une exception « Accès interdit »
      throw new AccessDeniedHttpException('Accès limité aux Joueurs');
    }

    return $this->render('TimTronBundle:Game:index.html.twig');
  }
}