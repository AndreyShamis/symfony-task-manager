<?php

namespace Werd\IotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeviceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('model')
            ->add('hostName')
            ->add('wifi_channel')
            ->add('wifi_rssi')
            ->add('ip_addr')
            ->add('wifi_mac_addr')
            ->add('core_version')
            ->add('sdk_version')
            ->add('boot_version')
            ->add('boot_mode')
            ->add('sketch_size')
            ->add('free_sketch_space')
            ->add('cpu_freq')
            ->add('flash_chip_size')
            ->add('flash_chip_speed')
            ->add('flash_chip_id')
            ->add('flash_chip_mode')
            ->add('lastSeen')
            ->add('addedDate');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Werd\IotBundle\Entity\Device'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'werd_iotbundle_device';
    }

}
