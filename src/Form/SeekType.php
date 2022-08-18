<?php

namespace App\Form\Seek;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SeekType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('denomination',TextType::class, ['required' => false])
        ->add('DCI',TextType::class, ['required' => false])
        ->add('submit', SubmitType::class, ['label' => 'Recherche d\'un médicament']);
    }


    public function getBlockPrefix()
    {
        return 'Seek_form';
    }
}