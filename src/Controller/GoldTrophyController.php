<?php

namespace App\Controller;

use App\Entity\GoldTrophy;
use App\Form\GoldTrophyType;
use App\Repository\GoldTrophyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gold/trophy")
 */
class GoldTrophyController extends AbstractController
{
    /**
     * @Route("/", name="gold_trophy_index", methods={"GET"})
     */
    public function index(GoldTrophyRepository $goldTrophyRepository): Response
    {
        return $this->render('gold_trophy/index.html.twig', [
            'gold_trophies' => $goldTrophyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gold_trophy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $goldTrophy = new GoldTrophy();
        $form = $this->createForm(GoldTrophyType::class, $goldTrophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($goldTrophy);
            $entityManager->flush();

            return $this->redirectToRoute('home_cabinet');
        }

        return $this->render('gold_trophy/new.html.twig', [
            'gold_trophy' => $goldTrophy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gold_trophy_show", methods={"GET"})
     */
    public function show(GoldTrophy $goldTrophy): Response
    {
        return $this->render('gold_trophy/show.html.twig', [
            'gold_trophy' => $goldTrophy,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gold_trophy_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GoldTrophy $goldTrophy): Response
    {
        $form = $this->createForm(GoldTrophyType::class, $goldTrophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gold_trophy_index');
        }

        return $this->render('gold_trophy/edit.html.twig', [
            'gold_trophy' => $goldTrophy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gold_trophy_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GoldTrophy $goldTrophy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$goldTrophy->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($goldTrophy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gold_trophy_index');
    }
}
