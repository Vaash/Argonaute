<?php

namespace App\Controller;

use App\Entity\Argonaute;
use App\Form\ArgonauteHiringFormType;
use phpDocumentor\Reflection\Types\Resource_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\User;

class ArgonauteController extends AbstractController
{
    /**
     * @Route("/", name="app_argonaute")
     */
    public function index(): Response
    {
        return $this->render('argonaute/index.html.twig', [
            'captain' => 'Captain',
        ]);
    }

    public function hire(Request $request): Response
    {
        $argonaute = new Argonaute();
        $argonaute->setName('name');

        $form = $this->createForm(ArgonauteHiringFormType::class, $argonaute);
        var_dump();
        die();
        return $this->renderForm('argonaute/index.html.twig', [
            'argonauteHiringForm' => $form,
        ]);
    }
}
