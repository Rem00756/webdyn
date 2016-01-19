<?php

namespace AD\PlatformBundle\Entity;

/**
 * CarsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByMotCle($motcle)
    {
        $qb = $this->createQueryBuilder('c');
        
        $qb
            ->where($qb->expr()->like('c.name', ':motcle'))
            ->setParameter('motcle', "%".$motcle."%")
            ;
        //Utilisation du querybuilder. Utilisation de la fonction expr() pour les 'where" un peu plus compliqué comme ici le like.
        return $qb
                ->getQuery()
                ->getResult()
                ;
    }
}
