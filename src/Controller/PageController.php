<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="page")
     */
    public function index(): Response
    {
        return $this->render('page/demo.html');
    }
     /**
     * @Route("/demo", name="demo")
     */
    public function demo(): Response
    {
        return $this->render('page/demo.html');
    }

    /**
     * @Route("/bug/{description}", name="bug")
     */
    public function bug($description)
    {

        return $this->render('page/test.html.twig', ['description' => $description]);
    }
}

