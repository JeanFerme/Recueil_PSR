<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Codex\SAVUUTIL;

class AfficheCodexController extends AbstractController
{
    #[Route('/affiche_codex', name: 'app_affiche_codex')]
    public function index(ManagerRegistry $doctrine): Response
    {   
        // $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLikenomSubstance('Paracétamol');
        $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLikenomVU('Paracetamol');
        return $this->render('affiche_codex/index.html.twig', [
            'controller_name' => 'AfficheCodexController',
            'medoc' => $medoc
        ]);
    }
}
