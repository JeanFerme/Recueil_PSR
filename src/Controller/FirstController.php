<?php

namespace App\Controller;

use App\Entity\Main\OrigineRef;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'app_first')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $origines = $doctrine->getRepository(OrigineRef::class)->findAll();

        return $this->render('first/index.html.twig', [
            'controller_name' => 'FirstController',
            'origines' => $origines,
        ]);
    }
}
