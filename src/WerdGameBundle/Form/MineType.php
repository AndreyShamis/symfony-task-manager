<?php

namespace WerdGameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WerdGameBundle\Model\MineType as MineTypeEnum;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MineType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('resourcePeerHour')->add('resourceCurrent')->add('resourceMax')->add('resourceLastFlush')->
        add('type', ChoiceType::class , $this->buildFormType())->
        add('name')->add('level')->add('nextLevelPrice')->add('life')->add('defense')->add('enabled')->add('coordinateX')->add('coordinateY')->add('size')->add('settlementId')->add('userId');
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
     * @return array
     */
    protected function buildFormType(){
        //      add('type', ChoiceType::class , $this->buildFormType())->
        return  array(
            'required' => true,
            'choices' => MineTypeEnum::getAvailableTypes(),
            'choices_as_values' => true,
            'choice_label' => function($choice) {
                return MineTypeEnum::getTypeName($choice);
            },
        );
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'werdgamebundle_mine';
    }


}
