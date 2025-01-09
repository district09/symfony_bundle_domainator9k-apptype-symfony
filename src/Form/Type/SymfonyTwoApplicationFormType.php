<?php


namespace DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Form\Type;

use DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Entity\SymfonyTwoApplication;
use DigipolisGent\Domainator9k\CoreBundle\Form\Type\AbstractApplicationFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SymfonyTwoApplicationFormType
 * @package DigipolisGent\Domainator9k\AppTypes\SymfonyTwoBundle\Form\Type
 */
class SymfonyTwoApplicationFormType extends AbstractApplicationFormType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);
        $builder->add('locale');
        $builder->add('secret');
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefault('data_class', SymfonyTwoApplication::class);
    }
}
