<?php

namespace AD\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('model')
            ->add('year')
            ->add('displacement')
            ->add('bodytype')
            ->add('fuel')
            ->add('description')
            ->add('image',          new ImageType(), array('required' => false))
            ->add('save',           'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AD\PlatformBundle\Entity\Cars'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ad_platformbundle_cars';
    }
}
