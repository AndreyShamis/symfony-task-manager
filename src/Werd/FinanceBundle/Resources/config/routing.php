<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('werd_finance_homepage', new Route('/', array(
    '_controller' => 'WerdFinanceBundle:Default:index',
)));

return $collection;
