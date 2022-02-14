<?php

namespace App\Controller;

use App\Entity\Bug;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Priority;
use App\Entity\Status;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="page")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsSinAsignar = $repositorio->findBy(["status" => "1"]);

        $bugsEnProceso = $repositorio->findBy(["status" => "2"]);

        $bugsEnPruebas = $repositorio->findBy(["status" => "3"]);

        $bugsAcabados = $repositorio->findBy(["status" => "4"]);

        return $this->render('page/demo.html.twig', ["bugsSinAsignar" => $bugsSinAsignar, "bugsEnProceso" => $bugsEnProceso, "bugsEnPruebas" => $bugsEnPruebas, "bugsAcabados" => $bugsAcabados]);
    }
     /**
     * @Route("/demo", name="demo")
     */
    public function demo(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsSinAsignar = $repositorio->findBy(["status" => "1"]);

        $bugsEnProceso = $repositorio->findBy(["status" => "2"]);

        $bugsEnPruebas = $repositorio->findBy(["status" => "3"]);

        $bugsAcabados = $repositorio->findBy(["status" => "4"]);

        return $this->render('page/demo.html.twig', ["bugsSinAsignar" => $bugsSinAsignar, "bugsEnProceso" => $bugsEnProceso, "bugsEnPruebas" => $bugsEnPruebas, "bugsAcabados" => $bugsAcabados]);
    }

    /**
     * @Route("/move/{id}/{nextStatus}", name="id")
     */
    public function move(ManagerRegistry $doctrine, $id, $nextStatus): Response
    {
        $entityManager = $doctrine->getManager();
        $repositorio = $doctrine->getRepository(Bug::class);
        $bugMover = $repositorio->find($id);

        if ($bugMover) {            
            $rep = $doctrine->getRepository(Status::class);
            $status = $rep->find($nextStatus);
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
        $status = $rep->find(Status::SIN_ASIGNAR);

        $bug = new Bug();
        $bug->setDescription($description);
        $bug->setPriority($priority);
        $bug->setStatus($status);
        // $bug->setDate(new DateTimeInterface);
        
        $entityManager->persist($bug);
        try {
            $entityManager->flush();
            return $this->render('page/bug.html.twig', ["bug" => $bug]);
        } catch (\Exception $e) {
            return new Response($e->getMessage());
            //return $this->render('page/demo.html');
        }

    }

    /**
     * @Route("/filter/priority", name="filter_priority")
     */
    public function filterByPriority(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsSinAsignar = $repositorio->findBy(["status" => "1"], ['priority' => 'DESC']);

        $bugsEnProceso = $repositorio->findBy(["status" => "2"], ['priority' => 'DESC']);

        $bugsEnPruebas = $repositorio->findBy(["status" => "3"], ['priority' => 'DESC']);

        $bugsAcabados = $repositorio->findBy(["status" => "4"], ['priority' => 'DESC']);

        return $this->render('page/demo.html.twig', ["bugsSinAsignar" => $bugsSinAsignar, "bugsEnProceso" => $bugsEnProceso, "bugsEnPruebas" => $bugsEnPruebas, "bugsAcabados" => $bugsAcabados]);
    }

    /**
     * @Route("/filter/date", name="filter_date")
     */
    public function filterByDate(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Bug::class);
        $bugsSinAsignar = $repositorio->findBy(["status" => "1"], ['date' => 'DESC']);

        $bugsEnProceso = $repositorio->findBy(["status" => "2"], ['date' => 'DESC']);

        $bugsEnPruebas = $repositorio->findBy(["status" => "3"], ['date' => 'DESC']);

        $bugsAcabados = $repositorio->findBy(["status" => "4"], ['date' => 'DESC']);

        return $this->render('page/demo.html.twig', ["bugsSinAsignar" => $bugsSinAsignar, "bugsEnProceso" => $bugsEnProceso, "bugsEnPruebas" => $bugsEnPruebas, "bugsAcabados" => $bugsAcabados]);
    }


}

