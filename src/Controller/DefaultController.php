<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/timer/{n}", name="timer")
     */
    public function timer($n): Response
    {
        $template = 'default/timer.html.twig';
        $args = [
            'timerDuration' => $n
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/study", name="study")
     */
    public function study(): Response
    {
        $template = 'default/study.html.twig';
        $args = [];
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
     * @Route("/trophies", name="trophies")
     */
    public function trophies(): Response
    {
        $template = 'default/trophies.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}
