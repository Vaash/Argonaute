<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArgonauteController extends AbstractController
{
    /**
     * @Route("/argonaute", name="app_argonaute")
     */
    public function index(): Response
    {
        return $this->render('argonaute/index.html.twig', [
            'controller_name' => 'ArgonauteController',
        ]);
    }
}