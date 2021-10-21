<?php

namespace App\Repository;

use App\Entity\InstrumentJouer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InstrumentJouer|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstrumentJouer|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstrumentJouer[]    findAll()
 * @method InstrumentJouer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstrumentJouerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstrumentJouer::class);
    }

    // /**
    //  * @return InstrumentJouer[] Returns an array of InstrumentJouer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InstrumentJouer
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
