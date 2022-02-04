<?php

namespace App\Controller;

use App\Entity\Bug;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Priority;
use App\Entity\Status;
use DateTimeInterface;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="page")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsSinAsignar = $repositorio->findBy(["status" => "1"]);

        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsEnProceso = $repositorio->findBy(["status" => "2"]);

        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsEnPruebas = $repositorio->findBy(["status" => "3"]);

        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsAcabados = $repositorio->findBy(["status" => "4"]);

        return $this->render('page/demo.html.twig', ["bugsSinAsignar" => $bugsSinAsignar, "bugsEnProceso" => $bugsEnProceso, "bugsEnPruebas" => $bugsEnPruebas, "bugsAcabados" => $bugsAcabados]);
    }
     /**
     * @Route("/demo", name="demo")
     */
    public function demo(): Response
    {
        return $this->render('page/demo.html');
    }

    /**
     * @Route("/move/{id}", name="id")
     */
    public function move(ManagerRegistry $doctrine, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Bug::class);
        $bugMover = $repositorio->find($id);
        if ($bugMover) {            
            $rep = $doctrine->getRepository(Status::class);
            $status = $rep->find(3);
            $bugMover->setStatus($status);
    
            $entityManager->persist($bugMover);
    
            try {
                $entityManager->flush();       
                return new Response("objeto actualizado");
            } catch (\Exception $e) {
                return new Response($e->getMessage());
            }
        }

    
    }

    /**
     * @Route("/insert/{description}/{priority}", name="bug")
     */
    public function insert(ManagerRegistry $doctrine, $description, $priority): Response
    {
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Priority::class);
        $priority = $repositorio->find($priority);

        $rep = $doctrine->getRepository(Status::class);
        $status = $rep->find(1);

        $bug = new Bug();
        $bug->setDescription($description);
        $bug->setPriority($priority);
        $bug->setStatus($status);
        // $bug->setDate(new DateTimeInterface);
        
        $entityManager->persist($bug);
        try {
            return $this->render('page/test.html.twig', ["bug" => $bug]);
            $entityManager->flush();
        } catch (\Exception $e) {
            return new Response($e->getMessage());
            //return $this->render('page/demo.html');
        }

    }
}

