<?php

namespace App\Repository;

use App\Entity\Fuseau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Fuseau|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fuseau|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fuseau[]    findAll()
 * @method Fuseau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuseauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fuseau::class);
    }

    // /**
    //  * @return Fuseau[] Returns an array of Fuseau objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fuseau
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
