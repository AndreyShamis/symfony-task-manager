<?php

namespace Werd\TesterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TesterBundle:Default:index.html.twig');
    }
}
