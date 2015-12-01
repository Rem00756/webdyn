<?php
// src/AD/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace AD\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AD\PlatformBundle\Entity\Category;

class LoadCars implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $names = array(
      'Mercedes',
      'Ford'
    );

    foreach ($names as $name) {
      // On crée la catégorie
      $marque = new \AD\PlatformBundle\Entity\Cars();
      $marque->setName($name);
      
      // On la persiste
      $manager->persist($marque);
    }
    
    $models = array(
        'Classe C',
        'Mustang'
    );
    
    foreach ($models as $model){
        $model = new \AD\PlatformBundle\Entity\Cars();
        $model->setModel($model);
        $manager->persist($model);
    }
    
    $years = array(
        '2001',
        '2005'
    );
    
    foreach ($years as $year){
        $year = new \AD\PlatformBundle\Entity\Cars();
        $year->setYear($year);
        $manager->persist($year);
    }

    
    

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}