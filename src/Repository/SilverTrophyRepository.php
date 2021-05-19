<?php

namespace App\Repository;

use App\Entity\SilverTrophy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SilverTrophy|null find($id, $lockMode = null, $lockVersion = null)
 * @method SilverTrophy|null findOneBy(array $criteria, array $orderBy = null)
 * @method SilverTrophy[]    findAll()
 * @method SilverTrophy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SilverTrophyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SilverTrophy::class);
    }

    // /**
    //  * @return SilverTrophy[] Returns an array of SilverTrophy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SilverTrophy
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
