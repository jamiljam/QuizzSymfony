<?php

namespace App\Form;


use App\Entity\Questionnaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionnairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('img')
        //     ->add('questions', CollectionType::class, [
        //     'entry_type' => QuestionsType::class,
        //     'entry_options' => ['label' => false],
        //     'allow_add' => true,
        //     'by_reference' => false,
        //     'allow_delete' => true,
        // ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Questionnaires::class,
        ]);
    }
}
