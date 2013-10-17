<?php

namespace Tim\TronBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
  public function indexAction()
  {
    return $this->render('TimTronBundle:Home:index.html.twig');
  }

  public function aboutAction()
  {
    return $this->render('TimTronBundle:Home:about.html.twig');
  }

  public function contactAction()
  {
    return $this->render('TimTronBundle:Home:contact.html.twig');
  }

  public function rulesAction()
  {
    return $this->render('TimTronBundle:Home:rules.html.twig');
  }
}
