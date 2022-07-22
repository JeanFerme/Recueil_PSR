<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Codex\SAVUUTIL;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AfficheCodexController extends AbstractController
{
    #[Route('/affiche_codex', name: 'app_affiche_codex')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {   
        $form =$this->createFormBuilder()
                    ->add('denomination',TextType::class, ['required' => false])
                    ->add('DCI',TextType::class, ['required' => false])
                    ->add('submit', SubmitType::class, ['label' => 'Recherche d\'un médicament'])
                    ->getForm()
                    ;
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance($data['denomination'],$data['DCI']);
            return $this->render('affiche_codex/index.html.twig', [
                'form_rech_med' => $form->createView(),
                'controller_name' => 'AfficheCodexController',
                'medoc' => $medoc
            ]);            
        }

        $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance('','');
        return $this->render('affiche_codex/index.html.twig', [
            'form_rech_med' => $form->createView(),
            'controller_name' => 'AfficheCodexController',
            'medoc' => $medoc
        ]);
    }


    public function FormRecherche()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_affiche_codex'))
            ->add('query', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez un mot-clé'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
