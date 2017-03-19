<?php

namespace MyApp\BanqueBundle\Controller;

use MyApp\BanqueBundle\Entity\CompteBanquaire;
use MyApp\BanqueBundle\Form\CompteBanquaireType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
    public function afficherAction()
    {
        $em=$this->getDoctrine()->getManager();
        $client=$em->getRepository('MyAppBanqueBundle:Client')->findAll();
        return $this->render('MyAppBanqueBundle:Client:Affichage.html.twig',array('data'=>$client));

    }
    public function ajoutCompteAction($cin , Request $req)
    {
        $compte = new CompteBanquaire();
        $em = $this->getDoctrine()->getManager();
        $Client = $em->getRepository('MyAppBanqueBundle:Client')->find($cin);


        $form = $this->createForm(CompteBanquaireType::class, $compte);
        if ($form->handleRequest($req)->isValid()) {

            $compte->setClient($Client);
            $em->persist($compte);
            $em->flush();
            return $this->redirectToRoute('ListeClients');
        }
        $compte2 = $em->getRepository('MyAppBanqueBundle:CompteBanquaire')->findBy(array('client'=>$cin));


        return $this->render('MyAppBanqueBundle:Client:ajoutCompte.html.twig', array('f' => $form->createView(), 'c' => $compte2,'client'=>$Client));

    }
    function verserAction($rib,Request $request)
    {
        $compte = new CompteBanquaire();
        if($request->isMethod('POST'))
        {
            $solde2=$request->get('soldeA');
            $solde2=intval($solde2);
            $em = $this->getDoctrine()->getManager();
            $compte = $em->getRepository('MyAppBanqueBundle:CompteBanquaire')->find($rib);
            $valSolde1= $compte->getSolde();
            $x=$solde2 + $valSolde1;

            $compte->setSolde($x);
            $em->persist($compte);
            $em->flush();
            return $this->redirectToRoute('ListeClients');

        }


//        return $this->redirectToRoute('Bank');
        return $this->render('@MyAppBanque/Client/verserSomme.html.twig');
    }
    function suprimerAction($rib)
    {
        $em = $this->getDoctrine()->getManager();
        $compte2 = $em->getRepository('MyAppBanqueBundle:CompteBanquaire')->find($rib);
        $em->remove($compte2);
        $em->flush();

        return $this->redirectToRoute('ListeClients');

    }
    function trieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $compte = $em->getRepository('MyAppBanqueBundle:CompteBanquaire')->findBy(array(),array('solde'=>'asc'),3,0);

        return $this->render('@MyAppBanque/Client/trie.html.twig', array('m' => $compte));

    }
}
