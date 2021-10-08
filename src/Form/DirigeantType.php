<?php

namespace App\Form;

use App\Entity\Dirigeants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DirigeantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'attr'=>[
                    'placeholder'=>'Nom'
                ]
            ])
            ->add('prenom',TextType::class,[
                'attr'=>[
                    'placeholder'=>'Prénom'
                ]
            ])
            ->add('sexe', ChoiceType::class,[

                'choices' => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme'
                    
                ],
                'expanded'=>true,
                'multiple'=>false
            ])
            ->add('mail',TextType::class,[
                'attr'=>[
                    'placeholder'=>'ex : nom@gmail.com'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dirigeants::class,
        ]);
    }
}
