<?php

namespace App\Controller;

use App\Repository\AssignmentRepository;
use App\Repository\BronzeTrophyRepository;
use App\Repository\SilverTrophyRepository;
use App\Repository\GoldTrophyRepository;
use App\Repository\StudyLengthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SubjectRepository;
use App\Entity\Subject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
     * @Route("/study", name="study")
     * @IsGranted("ROLE_USER", message="Access Denied: Make an account")
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
     * @Route("/assignment", name="assignment")
     * @IsGranted("ROLE_USER", message="Access Denied: Make an account")
     */
    public function assignment(AssignmentRepository $assignmentRepository): Response
    {
        $user = $this->getUser();
        $assignment = $assignmentRepository->findByUser($user);

        $template = 'assignment/assignment_index.html.twig';
        $args = [
            'assignment' => $assignment
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_janruary", name="calender_janruary")
     * @IsGranted("ROLE_USER", message="Access Denied: Make an account")
     */
    public function calender_janruary(): Response
    {
        $template = 'calender/calender_janruary.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_february", name="calender_february")
     */
    public function calender_february(): Response
    {
        $template = 'calender/calender_february.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_march", name="calender_march")
     */
    public function calender_march(): Response
    {
        $template = 'calender/calender_march.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_april", name="calender_april")
     */
    public function calender_april(): Response
    {
        $template = 'calender/calender_april.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_may", name="calender_may")
     */
    public function calender_may(): Response
    {
        $template = 'calender/calender_may.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_june", name="calender_june")
     */
    public function calender_june(): Response
    {
        $template = 'calender/calender_june.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_july", name="calender_july")
     */
    public function calender_july(): Response
    {
        $template = 'calender/calender_july.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_august", name="calender_august")
     */
    public function calender_august(): Response
    {
        $template = 'calender/calender_august.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_september", name="calender_september")
     */
    public function calender_september(): Response
    {
        $template = 'calender/calender_september.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_october", name="calender_october")
     */
    public function calender_october(): Response
    {
        $template = 'calender/calender_october.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_november", name="calender_november")
     */
    public function calender_november(): Response
    {
        $template = 'calender/calender_november.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/calender_december", name="calender_december")
     */
    public function calender_december(): Response
    {
        $template = 'calender/calender_december.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/cabinet", name="cabinet")
     * @IsGranted("ROLE_USER", message="Access Denied: Make an account")
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
     * @IsGranted("ROLE_USER", message="Access Denied: Make an account")
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
