<?php

namespace BiblioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BiblioBundle:Default:base.html.twig');
    }
}
