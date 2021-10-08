<?php

namespace App\Form;

use App\Entity\Societes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('type', ChoiceType::class,[
                'choices' => [
                    'SARL' => 'SARL',
                    'EURL' => 'EURL',
                    'SELARL'=>'SELARL',
                    'SA'=>'SA',
                    'SASU'=>'SASU',
                    'SNC'=>'SNC',
                    'SCP'=>'SCP'
                ],
                'expanded'=>true,
                'multiple'=>true
            ])
            ->add('codePostal', ChoiceType::class,[
                'choices' => [
                    '101' => 101,
                    '102' => 102,
                    '103'=>103,
                    '104'=>104,
                    '105'=>105,
                    '106'=>106,
                    '107'=>107,
                    '108'=>108,
                    '109'=>109,
                    '110'=>110,
                    '111'=>111,
                    '112'=>112
                ],
                'expanded'=>false,
                'multiple'=>false
            ])
            ->add('ville', ChoiceType::class,[
                'choices' => [
                    'Antananarivo' => 'Antananarivo',
                    'Antsirabe' => 'Antsiarabe',
                    'Anjozorobe'=>'Anjozorobe',
                    'Antananarivo Nord'=>'Antananarivo Nord',
                    'Antananarivo Sud'=>'Antananarivo Sud',
                    'Ankazobe'=>'Ankazobe',
                    'Ambohidratrimo'=>'Ambohidratrimo',
                    'Andramasina'=>'Andramasina',
                ],
                'expanded'=>false,
                'multiple'=>false
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societes::class,
        ]);
    }
}
