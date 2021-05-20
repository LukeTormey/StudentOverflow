<?php

namespace App\Controller;

use App\Entity\SilverTrophy;
use App\Form\SilverTrophyType;
use App\Repository\SilverTrophyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/silver/trophy")
 */
class SilverTrophyController extends AbstractController
{
    /**
     * @Route("/", name="silver_trophy_index", methods={"GET"})
     */
    public function index(SilverTrophyRepository $silverTrophyRepository): Response
    {
        return $this->render('silver_trophy/index.html.twig', [
            'silver_trophies' => $silverTrophyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="silver_trophy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $silverTrophy = new SilverTrophy();
        $form = $this->createForm(SilverTrophyType::class, $silverTrophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($silverTrophy);
            $entityManager->flush();

            return $this->redirectToRoute('home_cabinet');
        }

        return $this->render('silver_trophy/new.html.twig', [
            'silver_trophy' => $silverTrophy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="silver_trophy_show", methods={"GET"})
     */
    public function show(SilverTrophy $silverTrophy): Response
    {
        return $this->render('silver_trophy/show.html.twig', [
            'silver_trophy' => $silverTrophy,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="silver_trophy_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SilverTrophy $silverTrophy): Response
    {
        $form = $this->createForm(SilverTrophyType::class, $silverTrophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('silver_trophy_index');
        }

        return $this->render('silver_trophy/edit.html.twig', [
            'silver_trophy' => $silverTrophy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="silver_trophy_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SilverTrophy $silverTrophy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$silverTrophy->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($silverTrophy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('silver_trophy_index');
    }
}
