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
     * @Route("/bin/restore/{id}", name="app_restore_one")
     */
    public function restoreOne(ManagerRegistry $doctrine, $id): RedirectResponse
    {
        $em = $doctrine->getManager();
        $entity = $em->find(RecPSRTable::class ,$id);

        $entity->setVisible(true);

        $em->flush();

        return $this->redirectToRoute('app_show_bin_filter', ['sortFilter' => 'origine']);
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

    /**
     * @Route("/bin/empty/{id}", name="app_empty_one")
     */
    public function emptyOne(ManagerRegistry $doctrine, $id): RedirectResponse
    {
        $em = $doctrine->getManager();
        $entity = $em->find(RecPSRTable::class ,$id);

        $em->remove($entity);

        $em->flush();

        return $this->redirectToRoute('app_show_bin_filter', ['sortFilter' => 'origine']);
    }

    #[Route('/bin/{sortFilter}', name: 'app_show_bin_filter')]
    public function showBinFilter($sortFilter, ManagerRegistry $doctrine)
    {
        $tables = $doctrine->getRepository(RecPSRTable::class)->findBy(['visible' => false]);
        
        return $this->render('bin/index.html.twig', [
            'tables' => $tables,
            'sortFilter' => $sortFilter,
        ]);
    }

    #[Route('/bin', name: 'app_show_bin')]
    public function showBin(): RedirectResponse
    {
        return $this->redirectToRoute('app_show_bin_filter', ['sortFilter' => 'origine']);
    }
}
