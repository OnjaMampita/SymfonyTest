<?php

namespace App\Controller;

use App\Entity\Societes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeSocieteController extends AbstractController
{
    /**
     * @Route("/liste/societe", name="liste_societe")
     */
    public function index(): Response
    {
        $listesocietes = $this->getDoctrine()->getRepository(Societes::class)->findAll();
    //     // $table=$listesociete->();
        
    //     foreach($listesocietes as $listesociete){
    //         $list=$listesociete;
    //     }
    //  dd($list);
        return $this->render('liste_societe/index.html.twig', [
            'listesociete'=>$listesocietes,
            'controller_name' => 'ListeSocieteController'
        ]);
    }
}
