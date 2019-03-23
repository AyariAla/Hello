<?php

namespace EspritParcBundle\Controller;


use EspritParcBundle\Entity\Modele;
use EspritParcBundle\Form\ModeleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ModeleController extends Controller
{
    public function afficheMAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository("EspritParcBundle:Modele")->findAll();
        return $this->render('@EspritParc/Modele/afficheM.html.twig',array('m'=>$modeles));

    }

    public function supprimerMAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("EspritParcBundle:Modele")->find($id);
        $em->remove($modele);
        $em->flush();
        return $this->redirectToRoute('afficheM');

    }

    public function ajouterMAction(Request $request)
    {
        $modele=new Modele();
        if($request->isMethod('POST')){
            $modele->setLibelle($request->get('libelle'));
            $modele->setPays($request->get('pays'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();

            return $this->redirectToRoute('afficheM');
        }

        return $this->render('@EspritParc/Modele/ajouterM.html.twig',array());

    }

    public function ajouterMGAction(Request $request){
        $m = new Modele();
        $Form = $this->createForm(ModeleType::class,$m);
        $Form->handleRequest($request);

        if($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();

            return $this->redirectToRoute('afficheM');
        }

        return $this->render('@EspritParc/Modele/ajouterMG.html.twig',array('form'=>$Form->createView()));

    }

    public function modifierMAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("EspritParcBundle:Modele")->find($id);
        $Form=$this->createForm(ModeleType::class,$modele);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('afficheM');

        }


        return $this->render('@EspritParc/Modele/ajouterMG.html.twig',array('form'=>$Form->createView()));

    }

    public function rechercherFormulaireAction(){

        return $this->render('@EspritParc/Modele/rechercherM.html.twig',array());
    }


    public function rechercherMAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("EspritParcBundle:Modele")->find($id);
        $Form=$this->createForm(ModeleType::class,$modele);
        $Form->handleRequest($request);
        if($Form->isSubmitted()){
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('afficheM');

        }


        return $this->render('@EspritParc/Modele/ajouterMG.html.twig',array('form'=>$Form->createView()));

    }


}
