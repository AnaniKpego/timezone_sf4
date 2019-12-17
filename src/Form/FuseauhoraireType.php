<?php

namespace App\Form;

use App\Entity\Fuseauhoraire;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FuseauhoraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fuseau')
            ->add('utc')
            ->add('ville_en')
            ->add('ville_fr')
            ->add('pays',EntityType::class,[
                'class' => Pays::class,
                'choice_label' => 'nom_en',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fuseauhoraire::class,
        ]);
    }
}
