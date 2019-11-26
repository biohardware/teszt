<?php

namespace App\Repository;

use App\Entity\AabInteliart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AabInteliart|null find($id, $lockMode = null, $lockVersion = null)
 * @method AabInteliart|null findOneBy(array $criteria, array $orderBy = null)
 * @method AabInteliart[]    findAll()
 * @method AabInteliart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AabInteliartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AabInteliart::class);
    }

    // /**
    //  * @return AabInteliart[] Returns an array of AabInteliart objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AabInteliart
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
