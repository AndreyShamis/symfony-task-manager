<?php

namespace WerdGameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MineType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('resourcePeerHour')->add('resourceCurrent')->add('resourceMax')->add('resourceLastFlush')->add('level')->add('nextLevelPrice')->add('coordinateX')->add('coordinateY')->add('userId')->add('settlementId');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WerdGameBundle\Entity\Mine'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'werdgamebundle_mine';
    }


}
