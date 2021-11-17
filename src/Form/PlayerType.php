<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'name',
                    'class' => 'input-name',
                    ]  
            ])

            ->add('lastname', null, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'last name',
                    'class' => 'input-lastname'
                ] 
            ]) 

            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}

