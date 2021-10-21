<?php

namespace App\Repository;

use App\Entity\JamConcert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JamConcert|null find($id, $lockMode = null, $lockVersion = null)
 * @method JamConcert|null findOneBy(array $criteria, array $orderBy = null)
 * @method JamConcert[]    findAll()
 * @method JamConcert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JamConcertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JamConcert::class);
    }

    // /**
    //  * @return JamConcert[] Returns an array of JamConcert objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JamConcert
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
