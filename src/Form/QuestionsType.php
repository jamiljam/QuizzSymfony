<?php

namespace App\Form;

use App\Entity\Questions;
use App\Form\ReponsesType;
use App\Entity\Questionnaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class QuestionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('questionnaire', EntityType::class, [
            'class' => Questionnaires::class,
            'choice_label' => 'name',
            'multiple' => false,
            'expanded' => false,
        ])
            ->add('name')
            ->add('reponses', CollectionType::class,[
                'entry_type' => ReponsesType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true,
            // ->add('questionnaire')
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Questions::class,
        ]);
    }
}
