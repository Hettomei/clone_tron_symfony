<?php

namespace Tim\TronBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('TimTronBundle:Home:index.html.twig');
    }
}
