<?php

namespace DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Entity\SymfonyTwoSettings;

class SymfonyTwoSettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('locale', TextType::class, ['data' => 'nl'])
            ->add('secret', TextType::class, ['data' => substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 20)])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => SymfonyTwoSettings::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'symfonytwo_deploy_type_settings';
    }
}
