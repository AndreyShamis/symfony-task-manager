<?php

namespace Werd\FinanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WerdFinanceBundle:Default:index.html.twig');
    }
}
