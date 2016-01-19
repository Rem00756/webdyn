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
            ->add('name', 'choice', array(
                'choices' => array('9FF'=>'9FF', 'Abarth'=>'Abarth', 'AC'=>'AC', 'ACM'=>'ACM', 'Acura'=>'Acura', 'Alfa Romeo'=>'Alfa Romeo', 'Alfa Romeo'=>'Alfa Romeo', 'Aston Martin'=>'Aston Martin', 'Audi'=>'Audi',
                                    'Austin'=>'Austin', 'Bentley'=>'Bentley', 'Bmw'=>'Bmw', 'Bugatti'=>'Bugatti', 'Chevrolet'=>'Chevrolet', 'Citroen'=>'Citroen', 'Corvette'=>'Corvette', 'Ferrari'=>'Ferrari', 'Fiat'=>'Fiat',
                                    'Ford'=>'Ford', 'Honda'=>'Honda', 'Jaguar'=>'Jaguar', 'Jeep'=>'Jeep', 'Lada'=>'Lada', 'Lamborghini'=>'Lamborghini', 'Lancia'=>'Lancia', 'Ligier'=>'Ligier', 'Lotus'=>'Lotus', 'Maserati'=>'Maserati',
                                    'Mazda'=>'Mazda', 'McLaren'=>'McLaren', 'Mercedes-Benz'=>'Mercedes-Benz', 'MG'=>'MG', 'Mini'=>'Mini', 'Mitsubishi'=>'Mitsubishi', 'Morgan'=>'Morgan', 'Nissan'=>'Nissan', 'Opel'=>'Opel', 'Pagani'=>'Pagani',
                                    'Peugeot'=>'Peugeot', 'Porsche'=>'Porsche', 'Renault'=>'Renault', 'Rolls-Royce'=>'Rolls-Royce', 'Rover'=>'Rover', 'Ruf'=>'Ruf', 'Saab'=>'Saab', 'Seat'=>'Seat', 'Skoda'=>'Skoda', 'Subaru'=>'Subaru',
                                    'Talbot'=>'Talbot', 'Toyota'=>'Toyota', 'Trabant'=>'Trabant', 'Triumph'=>'Triumph', 'TVR'=>'TVR', 'Volkswagen'=>'Volkswagen', 'Volvo'=>'Volvo')
            ))
            ->add('model')
            ->add('year')
            ->add('displacement')
            ->add('bodytype', 'choice', array(
                'choices'=> array('Berline'=>'Berline', 'Break'=>'Break', 'Coupé'=>'Coupé', 'Coach'=>'Coach', 'Cabriolet'=>'Cabriolet', 'Coupé Cabriolet'=>'Coupé Cabriolet', 'Coupé 4 portes'=>'Coupé 4 portes',
                                    'Limousine'=>'Limousine', 'Landaulet'=>'Landaulet', 'Roadster'=>'Roadster', 'Spider'=>'Spider', 'Pick-up'=>'Pick-up', 'Monospace'=>'Monospace', 'Ludospace'=>'Ludospace')
            ))
            ->add('fuel', 'choice', array(
                'choices' => array('Essence 95'=>'Essence 95','Essence 98'=>'Essence 98' , 'Diesel' => 'Diesel')
            ))
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
