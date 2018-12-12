<?php

namespace App\Repository;

use App\Entity\Plattform;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Plattform|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plattform|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plattform[]    findAll()
 * @method Plattform[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlattformRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Plattform::class);
    }

    // /**
    //  * @return Plattform[] Returns an array of Plattform objects
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
    public function findOneBySomeField($value): ?Plattform
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
