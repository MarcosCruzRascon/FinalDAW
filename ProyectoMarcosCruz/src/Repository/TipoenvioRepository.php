<?php

namespace App\Repository;

use App\Entity\Tipoenvio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tipoenvio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tipoenvio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tipoenvio[]    findAll()
 * @method Tipoenvio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoenvioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tipoenvio::class);
    }

    // /**
    //  * @return Tipoenvio[] Returns an array of Tipoenvio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tipoenvio
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
