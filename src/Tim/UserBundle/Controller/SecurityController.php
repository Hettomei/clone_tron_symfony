<?php

namespace Tim\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Tim\UserBundle\Entity\User;

class SecurityController extends Controller
{
  // Taken here :
  // http://fr.openclassrooms.com/informatique/cours/developpez-votre-site-web-avec-le-framework-symfony2/premiere-approche-de-la-securite
  public function loginAction()
  {
    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirect($this->generateUrl('tim_tron_homepage'));
    }

    $request = $this->getRequest();
    $session = $request->getSession();

    // On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
    if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
      $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    } else {
      $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
      $session->remove(SecurityContext::AUTHENTICATION_ERROR);
    }

    return $this->render('TimUserBundle:Security:login.html.twig', array(
      // Valeur du précédent nom d'utilisateur entré par l'internaute
      'last_username' => $session->get(SecurityContext::LAST_USERNAME),
      'error'         => $error,
    ));
  }

  public function signupAction()
  {
    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirect($this->generateUrl('tim_tron_homepage'));
    }

    return $this->render(
      'TimUserBundle:Security:signup.html.twig',
      [
        'user' => new User(),
        'errors' => null
      ]
    );
  }

  public function signupCheckAction()
  {
    $request = $this->getRequest();

    $params = $request->request;

    $user = new User();
    $user->setUsername($params->get("_username"));
    $user->setPassword($params->get("_password"));
    $user->setConfirmPassword($params->get("_confirm_password"));
    $user->setSalt("");
    $user->setRoles(["ROLE_JOUEUR"]);

    //Need to use Symfony validator !!

    if($user->is_valid()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      return $this->redirect($this->generateUrl('tim_user_login'));
    }else{
      return $this->render(
        'TimUserBundle:Security:signup.html.twig',
        [
          'user' => $user,
          'errors' => $user->errors_to_s()
        ]
      );
    }

  }
}
