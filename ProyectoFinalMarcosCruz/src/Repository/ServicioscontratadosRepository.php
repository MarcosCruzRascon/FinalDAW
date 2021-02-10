<?php

namespace App\Repository;

use App\Entity\Servicioscontratados;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Servicioscontratados|null find($id, $lockMode = null, $lockVersion = null)
 * @method Servicioscontratados|null findOneBy(array $criteria, array $orderBy = null)
 * @method Servicioscontratados[]    findAll()
 * @method Servicioscontratados[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicioscontratadosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Servicioscontratados::class);
    }

    // /**
    //  * @return Servicioscontratados[] Returns an array of Servicioscontratados objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Servicioscontratados
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
