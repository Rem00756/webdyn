<?php

namespace AD\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre1')
            ->add('titre2')
            ->add('description', 'textarea', array('required' => false))
            ->add('imagearticle', 'collection',
                    array(
                        'type'          => new ImageArticleType(),
                        'required'      => true,
                        'allow_add'     => true,
                        'allow_delete'  => true
                        ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AD\PlatformBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ad_platformbundle_article';
    }
}
