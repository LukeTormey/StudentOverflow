<?php

namespace App\Controller;

use App\Repository\BronzeTrophyRepository;
use App\Repository\SilverTrophyRepository;
use App\Repository\GoldTrophyRepository;
use App\Repository\StudyLengthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SubjectRepository;
use App\Entity\Subject;

/**
 * @Route("/", name="home_")
 */
class DefaultController extends AbstractController
{
    /**
 * @Route("/", name="home")
 */
    public function index(): Response
    {
        $template = 'default/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/timer", name="timer_default")
     */
    public function timerDefault(): Response
    {
        // default 10 mins
        $n = 10;
        $template = 'default/timer.html.twig';
        $args = [
            'timerDuration' => $n
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/timer/{n}/{id}", name="timer")
     */
    public function timer($n, Subject $subject): Response
    {
        $template = 'default/timer.html.twig';
        $args = [
            'timerDuration' => $n,
            'subject' => $subject
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/create_trophy/{id}", name="create_trophy")
     */
    public function addTrophy(Subject $subject): Response
    {
        //create instance of Trophy2.php
        $user = $this->getUser();


        //redirect to trophy 
    }

    /**
     * @Route("/study", name="study")
     */
    public function study(SubjectRepository $subjectRepository): Response
    {
        $user = $this->getUser();
        $subject = $subjectRepository->findByUser($user);

        $template = 'default/study.html.twig';
        $args = [
            'subject' => $subject
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender", name="calender")
     */
    public function calender(): Response
    {
        $template = 'default/calender.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/cabinet", name="cabinet")
     */
    public function cabinet(GoldTrophyRepository $goldTrophyRepository, SilverTrophyRepository $silverTrophyRepository, BronzeTrophyRepository $bronzeTrophyRepository): Response
    {
        $user = $this->getUser();
        $goldtrophies = $goldTrophyRepository->findByUser($user);
        $silvertrophies = $silverTrophyRepository->findByUser($user);
        $bronzetrophies = $bronzeTrophyRepository->findByUser($user);

        $template = 'default/cabinet.html.twig';
        $args = [
            'goldtrophies' => $goldtrophies,
            'silvertrophies' => $silvertrophies,
            'bronzetrophies' => $bronzetrophies
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/cabinethub", name="cabinethub")
     */
    public function alltrophies(GoldTrophyRepository $goldTrophyRepository, SilverTrophyRepository $silverTrophyRepository, BronzeTrophyRepository $bronzeTrophyRepository): Response
    {
        $goldtrophies = $goldTrophyRepository->findAll();
        $silvertrophies = $silverTrophyRepository->findAll();
        $bronzetrophies = $bronzeTrophyRepository->findAll();

        $template = 'default/cabinethub.html.twig';
        $args = [
            'goldtrophies' => $goldtrophies,
            'silvertrophies' => $silvertrophies,
            'bronzetrophies' => $bronzetrophies
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/shortStudy", name="shortStudy")
     */
    public function shortStudy(): Response
    {
        $template = 'default/shortStudy.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/mediumStudy", name="mediumStudy")
     */
    public function mediumStudy(): Response
    {
        $template = 'default/mediumStudy.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/hardStudy", name="hardStudy")
     */
    public function longStudy(): Response
    {
        $template = 'default/hardStudy.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}
