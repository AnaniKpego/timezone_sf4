<?php

namespace App\Repository;

use App\Entity\Fuseauhoraire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Fuseauhoraire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fuseauhoraire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fuseauhoraire[]    findAll()
 * @method Fuseauhoraire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuseauhoraireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fuseauhoraire::class);
    }

    // /**
    //  * @return Fuseauhoraire[] Returns an array of Fuseauhoraire objects
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
    public function findOneBySomeField($value): ?Fuseauhoraire
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
