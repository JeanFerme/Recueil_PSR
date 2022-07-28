<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestbootstrapController extends AbstractController
{
    #[Route('/testbootstrap', name: 'app_testbootstrap')]
    public function index(): Response
    {
        return $this->render('testbootstrap/index.html.twig', [
            'controller_name' => 'TestbootstrapController',
        ]);
    }
}
