<?php

namespace App\Repository;

use App\Entity\Planinng;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Planinng|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planinng|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planinng[]    findAll()
 * @method Planinng[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaninngRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Planinng::class);
    }

    // /**
    //  * @return Planinng[] Returns an array of Planinng objects
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
    public function findOneBySomeField($value): ?Planinng
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
