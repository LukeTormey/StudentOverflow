<?php

namespace App\Repository;

use App\Entity\BronzeTrophy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BronzeTrophy|null find($id, $lockMode = null, $lockVersion = null)
 * @method BronzeTrophy|null findOneBy(array $criteria, array $orderBy = null)
 * @method BronzeTrophy[]    findAll()
 * @method BronzeTrophy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BronzeTrophyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BronzeTrophy::class);
    }

    // /**
    //  * @return BronzeTrophy[] Returns an array of BronzeTrophy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BronzeTrophy
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
