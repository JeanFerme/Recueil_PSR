<?php

namespace App\Controller;

use App\Entity\Main\RecPSRTable;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BinController extends AbstractController
{
    #[Route('/bin/restore', name: 'app_restore_bin')]
    public function restore(ManagerRegistry $doctrine): RedirectResponse
    {
        //$entites = $doctrine->getRepository(RecPSRTable::class)->findBy(['visible' => false]);

        $em = $doctrine->getManager();
        $entites = $em->getRepository(RecPSRTable::class)->findBy(['visible' => false]);

        foreach ($entites as $en) {
            $en->setVisible(true);
        }

        $em->flush();

        return $this->redirectToRoute('app_show_recueil', ['sortFilter' => 'origine']);
    }

    /**
     * @Route("/bin/empty", name="app_empty_psr")
     */
    public function empty(ManagerRegistry $doctrine): RedirectResponse
    {
        $em = $doctrine->getManager();
        $entites = $em->getRepository(RecPSRTable::class)->findBy(['visible' => false]);

        foreach ($entites as $en) {
            $em->remove($en);
        }

        $em->flush();

        return $this->redirectToRoute('app_show_recueil', ['sortFilter' => 'origine']);
    }
}
