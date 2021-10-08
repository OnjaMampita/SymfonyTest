<?php

namespace App\Controller;

use App\Entity\Dirigeants;
use App\Form\DirigeantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DirigeantController extends AbstractController
{
    /**
     * @Route("/dirigeant", name="dirigeant")
     */
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $dirigeant = new Dirigeants();
           //ajout des données
           $form=$this->createForm(DirigeantType::class,$dirigeant);    
           $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
               
               $manager->persist($dirigeant);
               $manager->flush();
               //rendre la page vide après ajout
               return $this->redirectToRoute('liste_dirigeant');
            }   

        return $this->render('dirigeant/index.html.twig', [
            'formDirigeant'=>$form->createView(),
            'controller_name' => 'DirigeantController',
        ]);
    }
}
