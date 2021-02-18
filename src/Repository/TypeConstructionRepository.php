<?php

namespace App\Repository;

use App\Entity\TypeConstruction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeConstruction|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeConstruction|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeConstruction[]    findAll()
 * @method TypeConstruction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeConstructionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeConstruction::class);
    }

    // /**
    //  * @return TypeConstruction[] Returns an array of TypeConstruction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeConstruction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
