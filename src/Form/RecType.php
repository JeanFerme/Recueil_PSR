<?php  
namespace App\Form\Rec;

use App\Entity\Main\DMMRef;
use App\Entity\Main\ListSurvRef;
use App\Entity\Main\MesImpact;
use App\Entity\Main\OrigineRef;
use App\Entity\Main\PropOutSurvRef;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RecType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('produit', TextType::class)
        ->add('substance', TextType::class)
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
        ->add('listSurv', EntityType::class, [
            'class' => ListSurvRef::class,
            'choice_label' => 'year',
        ])
        ->add('visible', CheckboxType::class, [
            'label' => 'isVisible', 
            'required' => false,
        ])
        ->add('save', SubmitType::class, ['label' => 'create Recueil'])
        ;
    }

    public function getBlockPrefix()
    {
        return 'Rec_filling_form';
    }
}