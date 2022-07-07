<?php

namespace App\Controller;

use App\Entity\Main\DMMRef;
use App\Entity\Main\MesImpact;
use App\Entity\Main\OrigineRef;
use App\Entity\Main\PropOutSurvRef;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PopulateController extends AbstractController
{
    #[Route('/populate/origine', name: 'app_populate_origine')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $criteria = array('origine' => 'Enquête PV');
        $origine = $em->getRepository(OrigineRef::class)->findBy($criteria);

        if (!$origine) {
            $origine = new OrigineRef();
            $origine->setOrigine('Enquête PV');

            $em->persist($origine);
            $em->flush();
        }

        $criteria = array('origine' => 'Grossesse');
        $origine = $em->getRepository(OrigineRef::class)->findBy($criteria);

        if (!$origine) {
            $origine = new OrigineRef();
            $origine->setOrigine('Grossesse');

            $em->persist($origine);
            $em->flush();
        }

        return $this->render('populate/index.html.twig', [
            'controller_name' => 'PopulateController',
        ]);
    }

    #[Route('/populate/dmm', name: 'app_populate_dmm')]
    public function populateDMM(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $criteria = array('pole' => 'dmm1');
        $dmm = $em->getRepository(DMMRef::class)->findBy($criteria);

        if (!$dmm) {
            $dmm = new DMMRef();
            $dmm->setPole('dmm1');

            $em->persist($dmm);
            $em->flush();
        }

        $criteria = array('pole' => 'dmm2');
        $dmm = $em->getRepository(DMMRef::class)->findBy($criteria);

        if (!$dmm) {
            $dmm = new DMMRef();
            $dmm->setPole('dmm2');

            $em->persist($dmm);
            $em->flush();
        }

        return $this->render('populate/index.html.twig', [
            'controller_name' => 'PopulateController',
        ]);
    }

    #[Route('/populate/mesImpact', name: 'app_populate_mesImpact')]
    public function populateMesImpact(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $criteria = array('libelle' => 'non');
        $mes = $em->getRepository(MesImpact::class)->findBy($criteria);

        if (!$mes) {
            $mes = new MesImpact();
            $mes->setLibelle('non');

            $em->persist($mes);
            $em->flush();
        }


        return $this->render('populate/index.html.twig', [
            'controller_name' => 'PopulateController',
        ]);
    }

    #[Route('/populate/propOutSurv', name: 'app_populate_propOutSurv')]
    public function populateProp(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $criteria = array('proposition' => 'analyse PSUR');
        $prop = $em->getRepository(PropOutSurvRef::class)->findBy($criteria);

        if (!$prop) {
            $prop = new PropOutSurvRef();
            $prop->setProposition('analyse PSUR');

            $em->persist($prop);
            $em->flush();
        }


        return $this->render('populate/index.html.twig', [
            'controller_name' => 'PopulateController',
        ]);
    }
}
