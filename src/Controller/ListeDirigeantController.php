<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeDirigeantController extends AbstractController
{
    /**
     * @Route("/liste/dirigeant", name="liste_dirigeant")
     */
    public function index(): Response
    {
        return $this->render('liste_dirigeant/index.html.twig', [
            'controller_name' => 'ListeDirigeantController',
        ]);
    }
}
