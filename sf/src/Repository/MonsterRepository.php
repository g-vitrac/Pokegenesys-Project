<?php

namespace App\Repository;

use App\Entity\Monster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MonsterRepository extends ServiceEntityRepository
{
 public function __construct(ManagerRegistry $registry)
 {
     parent::__construct($registry, Monster::class);
 }

    public function find10(){
     return $this->createQueryBuilder('m')
         ->setMaxResults(50)
         ->getQuery()
         ->getResult();
    }
}
