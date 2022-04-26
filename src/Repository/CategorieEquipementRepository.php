<?php

namespace App\Repository;

use App\Entity\CategorieEquipement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieEquipement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieEquipement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieEquipement[]    findAll()
 * @method CategorieEquipement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieEquipementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieEquipement::class);
    }

    // /**
    //  * @return CategorieEquipement[] Returns an array of CategorieEquipement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id_categorie_equipement', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieEquipement
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
