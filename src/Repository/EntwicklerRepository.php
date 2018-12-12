<?php

namespace App\Repository;

use App\Entity\Entwickler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Entwickler|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entwickler|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entwickler[]    findAll()
 * @method Entwickler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntwicklerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Entwickler::class);
    }

    // /**
    //  * @return Entwickler[] Returns an array of Entwickler objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entwickler
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
