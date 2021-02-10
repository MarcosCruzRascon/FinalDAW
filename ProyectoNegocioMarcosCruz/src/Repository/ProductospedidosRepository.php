<?php

namespace App\Repository;

use App\Entity\Productospedidos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Productospedidos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Productospedidos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Productospedidos[]    findAll()
 * @method Productospedidos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductospedidosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Productospedidos::class);
    }

    // /**
    //  * @return Productospedidos[] Returns an array of Productospedidos objects
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
    public function findOneBySomeField($value): ?Productospedidos
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
