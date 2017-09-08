<?php

namespace WerdGameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeHeroType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('price')->add('powerAttack')->add('powerAttackSpeed')->add('powerAttackAccuracy')->add('powerDefense')->add('powerDefenseAgility')->add('powerMovement')->add('powerAccuracy')->add('heroRace');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WerdGameBundle\Entity\TypeHero'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'werdgamebundle_typehero';
    }


}
