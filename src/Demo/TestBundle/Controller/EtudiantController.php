<?php

namespace Demo\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EtudiantController extends Controller
{
    public function AffichageAction($id)
    {
        return new Response("Bonjour !".$id);
    }

    public function DormirAction()
    {
        return new Response("Bonsoir !");
    }
}
