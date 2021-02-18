<?php

namespace App\Repository;

use App\Entity\NatureLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NatureLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NatureLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NatureLocation[]    findAll()
 * @method NatureLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NatureLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NatureLocation::class);
    }

    // /**
    //  * @return NatureLocation[] Returns an array of NatureLocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NatureLocation
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
