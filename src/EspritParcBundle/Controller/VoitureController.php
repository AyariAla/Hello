<?php

namespace EspritParcBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use EspritParcBundle\Entity\Voiture;
use EspritParcBundle\Form\VoitureType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class VoitureController extends Controller
{
    public function indexAction()
    {
        return $this->render('EspritParcBundle:Default:index.html.twig');
    }

    public function AffichageAction($marque)
    {
        //return new Response("Affichage normal ! La marque de la voiture est ".$marque);
        return $this->render('@EspritParc/Voiture/affichage.html.twig',array('m'=>$marque));
        //  return $this->render('@EspritParc/Voiture/affichage.html.twig',array('m'=>$marque));

    }

    public function ListAction()
    {
        $marques = array('BMW','Renault','Porsche','Honda');
        return $this->render('@EspritParc/Voiture/list.html.twig',array('marques'=>$marques));
        //  return $this->render('@EspritParc/Voiture/affichage.html.twig',array('m'=>$marque));

    }

    public function AjoutVoitureGAction( Request $request){
        $voiture = new Voiture();
        $Form = $this->createForm(VoitureType::class,$voiture);
        $Form->handleRequest($request);

        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('afficheV');
        }

        return $this->render('@EspritParc/Voiture/ajouterVoitureG.html.twig',array('form'=>$Form->createView()));

    }

    public function afficheVAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository("EspritParcBundle:Voiture")->findAll();
        return $this->render('@EspritParc/Voiture/afficheVoiture.html.twig',array('m'=>$modeles));

    }


    public function rechercherVoitureAction(){

        return $this->render('@EspritParc/Voiture/rechercherV.html.twig',array());

    }


    public function rechercherVAction($lib,Request $request)
        {
            $em=$this->getDoctrine()->getManager();
            if($request->isMethod('POST')){
                $voiture=$em->getRepository("EspritParcBundle:Voiture")->findBy(['ref'=>$request->get('ref')]);
                return $this->render('@EspritParc/Voiture/rechercherV.html.twig',array('v'=>$voiture));

            }



            $voiture=$em->getRepository("EspritParcBundle:Voiture")->findBy($lib);

        }

}
