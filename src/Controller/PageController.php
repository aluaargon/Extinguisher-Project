<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Priority;

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
     * @Route("/insert/{description}/{priority}", name="bug")
     */
    public function insert(ManagerRegistry $doctrine, $description, $priority)
    {
        $repositorio = $doctrine->getRepository(Priority::class);
        $priority = $repositorio->find($priority);
        return $this->render('page/test.html.twig', ["description" => $description, "priority" => $priority]);
    }
}

