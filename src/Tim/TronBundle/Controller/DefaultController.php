<?php

namespace Tim\TronBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TimTronBundle:Default:index.html.twig', array('name' => $name));
    }
}
