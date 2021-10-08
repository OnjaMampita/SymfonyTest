<?php

namespace App\Controller;

use App\Entity\Societes;
use App\Form\SocieteType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
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

        
       
   

                    //ajout des données
              /*  $form=$this->createForm(SocieteType::class,$societe);    
                $form->handleRequest($request);

                 if($form->isSubmitted()){
                    //dd($request);
                    $manager->persist($societe);
                    $manager->flush();
                    //rendre la page vide après ajout
                    return $this->redirectToRoute('societe');
                 }   */
            
                 
        
              $societe = new Societes();

              if($request->request->get('nom') ||$request->request->get('description')||
              ($request->request->get('codepostal'))||
              $request->request->get('ville'))  
              {
                  //dd($request);
                  $type = [];
                  if($request->get('type')=="on"){
                        $type[]='SARL';
                  }
                  if($request->get('type2')=="on"){
                    $type[]='EURL';
                    }
                    if($request->get('type3')=="on"){
                        $type[]='SELARL';
                     }
                     if($request->get('type4')=="on"){
                        $type[]='SA';
                     }
                     if($request->get('type5')=="on"){
                        $type[]='SASU';
                     }
                     if($request->get('type6')=="on"){
                        $type[]='SNC';
                     }
                     if($request->get('type7')=="on"){
                        $type[]='SCP';
                     }

                
                $societe->setNom($request->request->get('nom'))
                ->setDescription($request->request->get('description'))
                ->setType($type)
                ->setCodePostal($request->request->get('codepostal'))
                ->setVille($request->request->get('ville'));

                $manager->persist($societe);
                $manager->flush();
                return $this->redirectToRoute('societe');
              }

              
           
          

        return $this->render('societe/index.html.twig', [
           // 'formSociete'=>$form->createView(),
            'controller_name' => 'SocieteController',
        ]);
    }
}
