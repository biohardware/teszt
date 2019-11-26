<?php

namespace App\Repository;

use App\Entity\Proba;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Proba|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proba|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proba[]    findAll()
 * @method Proba[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProbaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proba::class);
    }

    // /**
    //  * @return Proba[] Returns an array of Proba objects
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
    public function findOneBySomeField($value): ?Proba
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
