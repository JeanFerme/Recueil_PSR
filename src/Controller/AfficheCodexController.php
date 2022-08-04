<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Codex\SAVUUTIL;
use App\Entity\Main\RecPSRTable;
use App\Form\Rec\RecType;
use App\Form\Seek\SeekType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\Codex\SAVUUTILRepository;


class AfficheCodexController extends AbstractController
{
    #[Route('/affiche_codex/{denomination}/{dci}', name: 'app_affiche_codex_arg')]
    #[Route('/affiche_codex', name: 'app_affiche_codex')]
    public function index(Request $request, ManagerRegistry $doctrine, $dci='', $denomination=''): Response
    {   
        dump($request);

        // Formulaire de recherche des médicaments par dénomination et/ou DCI
        /*$seekForm =$this->createFormBuilder()
                    ->add('denomination',TextType::class, ['required' => false])
                    ->add('DCI',TextType::class, ['required' => false])
                    ->add('submit', SubmitType::class, ['label' => 'Recherche d\'un médicament'])
                    ->getForm()
                    ;*/
        $seekForm = $this->createForm(SeekType::class);
        $seekForm->handleRequest($request);


        // Liste des médicaments recherchés
        if ($seekForm->isSubmitted() && $seekForm->isValid()) {
            $data = $seekForm->getData();
            $deno=$data['denomination'];
            $dataDCI=$data['DCI'];

            return $this->redirectToRoute('app_affiche_codex_arg', ['denomination' => $deno, 'dci' => $dataDCI]);
        }

        // Formulaire pour populer le menu déroulant
        $formSelectMedic = $this 
                            ->createFormBuilder()                
                            ->add('savuutil',EntityType::class, [
                                'class' => SAVUUTIL::class,
                                'choice_label' => 'NomVU',
                                'placeholder' => 'Merci de sélectionner un médicament',
                                'query_builder' => function (SAVUUTILRepository $SAVUUTILRepo) use ( $denomination, $dci){
                                        return $SAVUUTILRepo->findLike_nomVU_nomSubstance_QB($denomination, $dci, 100);}
                                    ])
                            ->add('submit', SubmitType::class, ['label' => 'Selection du médicament'])
                            ->getForm()
                            ;

        if ($request->isMethod('POST') &&  array_key_exists('form' ,$request->request->all())) {
            $formSelectMedic->submit($request->request->all()['form']);
        }
        //$formSelectMedic->handleRequest($request); 

        //Formulaire de l'entité recueil
        $recueil = new RecPSRTable();

        if ($formSelectMedic->isSubmitted() && $formSelectMedic->isValid()) {
            $savutil = $formSelectMedic->getData()['savuutil'];
            dump($savutil);
            $recueil->setProduit($savutil->getNomVu());
            $recueil->setSubstance($savutil->getNomSubstance());
        }

        $formRec = $this->createForm(RecType::class, $recueil);

        if ($seekForm->isSubmitted() && $seekForm->isValid()) {
            //$data = $form->getData();
            //$medoc = $doctrine->getRepository(SAVUUTIL::class, 'codex')->findLike_nomVU_nomSubstance($data['denomination'],$data['DCI']);
            dump($data);
            return $this->render('affiche_codex/index.html.twig', [
                'form_rech_med' => $seekForm->createView(),
                'form_select_med' => $formSelectMedic->createView(),
                'form_rec' => $formRec->createView(),
                'controller_name' => 'AfficheCodexController',
            ]);     
        }


        return $this->render('affiche_codex/index.html.twig', [
            'form_rech_med' => $seekForm->createView(),
            'form_select_med' => $formSelectMedic->createView(),
            'form_rec' => $formRec->createView(),
            'controller_name' => 'AfficheCodexController',
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
