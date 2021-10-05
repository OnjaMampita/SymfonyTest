<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PricipalController extends AbstractController
{
    /**
     * @Route("/pricipal", name="pricipal")
     */
    public function index(): Response
    {
        return $this->render('pricipal/index.html.twig', [
            'controller_name' => 'PricipalController',
        ]);
    }

     /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('home.html.twig', [
        
        ]);
    }
}
