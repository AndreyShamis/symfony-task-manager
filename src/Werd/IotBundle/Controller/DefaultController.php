<?php

namespace Werd\IotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IotBundle:Default:index.html.twig');
    }
}
