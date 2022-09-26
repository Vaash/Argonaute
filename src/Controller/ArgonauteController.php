<?php

namespace App\Controller;

use App\Repository\ArgonauteRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Argonaute;
use App\Form\ArgonauteHiringFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArgonauteController extends AbstractController
{
    /**
     * @Route("/", name="app_argonaute")
     */
    public function index(Request $request,ManagerRegistry $doctrine,ArgonauteRepository $argonauteRepository): Response
    {

        $entityManager = $doctrine->getManager();
        $argonaute = new Argonaute();

        $form = $this->createForm(ArgonauteHiringFormType::class, $argonaute);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $argonaute = $form->getData();
            $entityManager->persist($argonaute);
            $entityManager->flush();
            $this->addFlash('success', 'Argonaute engagé !');
            return $this->redirectToRoute('app_argonaute');
        }

        $argonautes = $argonauteRepository->findAll();

        return $this->renderForm('argonaute/index.html.twig', [
            'argonauteHiringForm' => $form,
            'argonauteList' => $argonautes,
        ]);
    }
}
