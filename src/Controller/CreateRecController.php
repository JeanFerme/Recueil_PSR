<?php

namespace App\Controller;

use App\Entity\Main\OrigineRef;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateRecController extends AbstractController
{
    #[Route('/newrec', name: 'app_create_rec')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $origines = $doctrine->getRepository(OrigineRef::class)->findAll();

        return $this->render('create_rec/index.html.twig', [
            'controller_name' => 'CreateRecController',
            'origines' => $origines,
        ]);
    }
}
