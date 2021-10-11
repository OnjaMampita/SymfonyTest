<?php

namespace App\Controller;

use App\Entity\Dirigeants;
use App\Repository\DirigeantsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeDirigeantController extends AbstractController
{
    /**
     * @Route("/liste/dirigeant", name="liste_dirigeant")
     */
    public function index(): Response // DirigeantRepository
    {

        //methode findby qui permet  de récupérer les données  avec des critères de filtre et d etri
        $listedirigeant = $this->getDoctrine()->getRepository(Dirigeants::class)->findAll();

        /** 
         *  $listedirigeant =$dirigenrepository->findAll();
         */

        return $this->render('liste_dirigeant/index.html.twig', [
            'listedirigeants'=>$listedirigeant,
            'controller_name' => 'ListeDirigeantController'
        ]);

        
    }

    /**
     * 
     * @Route("/delete_dirgeant/{id}", name="delete_dirigeant")
     */

    public function delete_dirigeant($id, DirigeantsRepository $dirigeantsRepository, Request $request,EntityManagerInterface $manager){
        $dirigeant = $dirigeantsRepository->find($id);
        if(!$dirigeant){
            throw $this->createNotFoundException("Identifiant n'existe pas ".$id);
    }    
        $manager->remove($dirigeant);
        $manager->flush();
    

        return $this->redirect($this->generateUrl('liste_dirigeant'));
    
    }

}
