<?php

namespace Demo\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@DemoTest/Default/index.html.twig');
    }
}
