<?php

namespace App\Controller;

use App\Entity\Dirigeants;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
