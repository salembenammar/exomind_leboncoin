<?php

namespace App\Repository;

use App\Entity\AnnonceDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnnonceDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnonceDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnonceDetails[]    findAll()
 * @method AnnonceDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnonceDetails::class);
    }

    // /**
    //  * @return AnnonceDetails[] Returns an array of AnnonceDetails objects
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
    public function findOneBySomeField($value): ?AnnonceDetails
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
