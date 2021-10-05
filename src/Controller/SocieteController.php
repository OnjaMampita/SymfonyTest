<?php

namespace App\Controller;

use App\Entity\Societes;
use App\Form\SocieteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocieteController extends AbstractController
{
    /**
     * @Route("/societe", name="societe")
     */
    public function index(Request $request, EntityManagerInterface $manager)
    {
       
        $societe = new Societes();
   

                    //ajout des données
                $form=$this->createForm(SocieteType::class,$societe);    
                $form->handleRequest($request);

                 if($form->isSubmitted()){
                    //dd($request);
                    $manager->persist($societe);
                    $manager->flush();
                    //rendre la page vide après ajout
                    return $this->redirectToRoute('societe');
                 }   
        return $this->render('societe/index.html.twig', [
            'formSociete'=>$form->createView(),
            'controller_name' => 'SocieteController',
        ]);
    }
}
