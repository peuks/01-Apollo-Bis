<?php

namespace App\Repository;

use App\Entity\PeriodeConstruction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PeriodeConstruction|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodeConstruction|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodeConstruction[]    findAll()
 * @method PeriodeConstruction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodeConstructionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodeConstruction::class);
    }

    // /**
    //  * @return PeriodeConstruction[] Returns an array of PeriodeConstruction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PeriodeConstruction
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
