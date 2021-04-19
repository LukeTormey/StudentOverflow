<?php

namespace App\Repository;

use App\Entity\StudyLength;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudyLength|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudyLength|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudyLength[]    findAll()
 * @method StudyLength[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudyLengthRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudyLength::class);
    }

    // /**
    //  * @return StudyLength[] Returns an array of StudyLength objects
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
    public function findOneBySomeField($value): ?StudyLength
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
