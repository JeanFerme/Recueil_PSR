<?php

namespace App\Controller;

use App\Entity\Main\DMMRef;
use App\Entity\Main\MesImpact;
use App\Entity\Main\OrigineRef;
use App\Entity\Main\PropOutSurvRef;
use App\Entity\Main\RecPSRTable;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateRecController extends AbstractController
{
    /** 
     * @Route("/newrec", name="app_create_rec")
     * @param Request
     */
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();

        $recueil = new RecPSRTable();

        $mesImpact = new MesImpact();
        $mesImpact->setLibelle('next');
        $em->persist($mesImpact);

        $form = $this->createFormBuilder($recueil)
            ->add('origine', EntityType::class, [
                'class' => OrigineRef::class,
                'choice_label' => 'origine',
            ])
            ->add('dmm', EntityType::class, [
                'class' => DMMRef::class,
                'choice_label' => 'pole'
            ])
            ->add('propSurv', EntityType::class, [
                'class' => PropOutSurvRef::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'proposition',
                //'choice_attr' => function($choice, $key, $value) {
                //return ['class' => 'col-sm'];
                //}
            ])
            ->add('niveau_de_risque', IntegerType::class, ['property_path' => 'niveau_risque'])
            ->add('problematique', TextType::class)
            ->add('resultat_surv', TextareaType::class)
            ->add('priorisation', IntegerType::class)
            ->add('mesure_de_maitrise_de_risque', TextareaType::class, ['property_path' => 'mesMaitRisk'])
            ->add('mesure_dimpact', EntityType::class, [
                'property_path' => 'mesImpact',
                'class' => MesImpact::class,
                'choice_label' => 'libelle',
            ])
            ->add('mesImpactComment', TextareaType::class)
            ->add('commentaire', TextareaType::class)
            ->add('listSurv', TextType::class)
            ->add('visible', CheckboxType::class, [
                'label' => 'isVisible',
                'required' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'create Recueil'])
            ->getForm();

        $form->handleRequest($request);
        dump($form);
        if ($form->isSubmitted() && $form->isValid()) {
            $recueil = $form->getData();
            $em->persist($recueil);
            $em->flush();
        }

        return $this->renderForm('create_rec/form.html.twig', [
            'form' => $form,
        ]);

        /*return $this->render('create_rec/index.html.twig', [
            'controller_name' => 'CreateRecController',
            'origines' => $origines,
        ]);*/
    }

    #[Route('/showrec', name: 'app_show_recueil')]
    public function newRec(ManagerRegistry $doctrine)
    {
        $tables = $doctrine->getRepository(RecPSRTable::class)->findAll();

        dump($tables);

        return $this->render('create_rec/table.html.twig', [
            'controller_name' => 'FirstController',
            'tables' => $tables,
        ]);
    }
}
