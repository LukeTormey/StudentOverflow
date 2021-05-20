<?php

namespace App\Controller;

use App\Entity\BronzeTrophy;
use App\Form\BronzeTrophyType;
use App\Repository\BronzeTrophyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bronze/trophy")
 */
class BronzeTrophyController extends AbstractController
{
    /**
     * @Route("/", name="bronze_trophy_index", methods={"GET"})
     */
    public function index(BronzeTrophyRepository $bronzeTrophyRepository): Response
    {
        return $this->render('bronze_trophy/index.html.twig', [
            'bronze_trophies' => $bronzeTrophyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bronze_trophy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bronzeTrophy = new BronzeTrophy();
        $form = $this->createForm(BronzeTrophyType::class, $bronzeTrophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bronzeTrophy);
            $entityManager->flush();

            return $this->redirectToRoute('home_cabinet');
        }

        return $this->render('bronze_trophy/new.html.twig', [
            'bronze_trophy' => $bronzeTrophy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bronze_trophy_show", methods={"GET"})
     */
    public function show(BronzeTrophy $bronzeTrophy): Response
    {
        return $this->render('bronze_trophy/show.html.twig', [
            'bronze_trophy' => $bronzeTrophy,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bronze_trophy_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BronzeTrophy $bronzeTrophy): Response
    {
        $form = $this->createForm(BronzeTrophyType::class, $bronzeTrophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bronze_trophy_index');
        }

        return $this->render('bronze_trophy/edit.html.twig', [
            'bronze_trophy' => $bronzeTrophy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bronze_trophy_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BronzeTrophy $bronzeTrophy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bronzeTrophy->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bronzeTrophy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bronze_trophy_index');
    }
}
