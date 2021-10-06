<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Form\VilleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VilleController extends AbstractController
{
    /**
     * @Route("/ville", name="ville")
     */
    public function index(Request $request, EntityManagerInterface $manager): Response
    {

        $ville = new Ville();

        //ajout
        $form=$this->createForm(VilleType::class,$ville);    
        $form->handleRequest($request);

         if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($ville);
            $manager->flush();
            //rendre la page vide après ajout
            return $this->redirectToRoute('ville');
         }   
        return $this->render('ville/index.html.twig', [
            'formVille'=>$form->createView(),
            'controller_name' => 'VilleController',
        ]);
    }
}
