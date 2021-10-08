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
        $listesociete = $this->getDoctrine()->getRepository(Societes::class)->findAll();


        return $this->render('liste_societe/index.html.twig', [
            'listesociete'=>$listesociete,
            'controller_name' => 'ListeSocieteController'
        ]);
    }
}
