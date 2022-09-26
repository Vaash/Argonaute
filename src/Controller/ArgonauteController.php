<?php

namespace App\Controller;

use App\Repository\ArgonauteRepository;
use Doctrine\Persistence\ManagerRegistry;
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
    public function index(Request $request,ManagerRegistry $doctrine,ArgonauteRepository $argonauteRepository): Response
    {
//        dump($argonauteRepository->findAll());
//        die();
        $entityManager = $doctrine->getManager();
        $argonaute = new Argonaute();

        $form = $this->createForm(ArgonauteHiringFormType::class, $argonaute);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $argonaute = $form->getData();
//            dd($argonaute, $argonauteRepository);
            $entityManager->persist($argonaute);
            $entityManager->flush();
        }

        $argonautes = $argonauteRepository->findAll();

        return $this->renderForm('argonaute/index.html.twig', [
            'captain' => 'Captain',
            'argonauteHiringForm' => $form,
            'argonauteList' => $argonautes,
        ]);
    }
}
