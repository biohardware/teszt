<?php

namespace App\Repository;

use App\Entity\AabAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AabAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method AabAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method AabAdmin[]    findAll()
 * @method AabAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AabAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AabAdmin::class);
    }

    // /**
    //  * @return AabAdmin[] Returns an array of AabAdmin objects
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
    public function findOneBySomeField($value): ?AabAdmin
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
