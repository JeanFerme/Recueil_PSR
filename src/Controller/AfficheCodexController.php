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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\Codex\SAVUUTILRepository;


class AfficheCodexController extends AbstractController
{
    #[Route('/affiche_codex', name: 'app_affiche_codex')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {   


        // Formulaire de recherche des médicaments par dénomination et/ou DCI
        $form =$this->createFormBuilder()
                    ->add('denomination',TextType::class, ['required' => false])
                    ->add('DCI',TextType::class, ['required' => false])
                    ->add('submit', SubmitType::class, ['label' => 'Recherche d\'un médicament'])
                    ->getForm()
                    ;
        $form->handleRequest($request);


        // Liste des médicaments recherchés
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance($data['denomination'],$data['DCI']);
            $deno=$data['denomination'];
            $DCI=$data['DCI'];
        }
        else {
            $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance('','');
            $deno='';
            $DCI='';
        }


        // Formulaire pour populer le menu déroulant
        $formSelectMedic = $this 
                            ->createFormBuilder()                
                            ->add('denomination',EntityType::class, [
                                'class' => SAVUUTIL::class,
                                // 'choice_label' => fn(SAVUUTIL $SAVU) => $SAVU->getCodeVU() . ' - ' . $SAVU->getNomVU()
                                'choice_label' => 'NomVU',
                                'placeholder' => 'Merci de sélectionner un médicament',
                                'query_builder' => function (SAVUUTILRepository $SAVUUTILRepo) use ( $deno, $DCI ){
                                        return $SAVUUTILRepo->findLike_nomVU_nomSubstance_QB($deno, $DCI);}
                                    ])
                            ->add('submit', SubmitType::class, ['label' => 'Selection du médicament'])
                            ->getForm()
                            ;
        $formSelectMedic->handleRequest($request); 
        
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance($data['denomination'],$data['DCI']);
            dump($data);
            return $this->render('affiche_codex/index.html.twig', [
                'form_rech_med' => $form->createView(),
                'form_select_med' => $formSelectMedic->createView(),
                'controller_name' => 'AfficheCodexController',
                'medoc' => $medoc
            ]);            
        }
        if ($formSelectMedic->isSubmitted() && $formSelectMedic->isValid()) {
            $dataSelectMedic = $formSelectMedic->getData();
            dd($dataSelectMedic);
            // $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance($data['denomination'],$data['DCI']);
            // dump($data);
            // return $this->render('affiche_codex/index.html.twig', [
            //     'form_rech_med' => $form->createView(),
            //     'form_select_med' => $formSelectMedic->createView(),
            //     'controller_name' => 'AfficheCodexController',
            //     'medoc' => $medoc
            // ]);            
        }

        $medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance('','');
        return $this->render('affiche_codex/index.html.twig', [
            'form_rech_med' => $form->createView(),
            'form_select_med' => $formSelectMedic->createView(),
            'controller_name' => 'AfficheCodexController',
            'medoc' => $medoc
        ]);
    }

    /**
     * Renvoi un array avec les NomVU d'une entité SAVUUTIL
     *
     * @param [type] $entity
     * @return Array
     */
    public function EntityToArray_NomVU($entity) : Array
    {   
        foreach ($entity as $entite) {
            $array[] = $entite->getNomVU();
        }
        return $array;
    }
    
    /**
     * Renvoi un array avec les NomVU d'une entité SAVUUTIL
     *
     * @param [type] $entity
     * @return Array
     */
    public function EntityToArray_CodeVU($entity) : Array
    {   
        foreach ($entity as $entite) {
            $array[] = $entite->getCodeVU();
        }
        return $array;
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
