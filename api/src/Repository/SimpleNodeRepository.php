<?php

namespace App\Repository;

use App\Entity\SimpleNode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SimpleNode|null find($id, $lockMode = null, $lockVersion = null)
 * @method SimpleNode|null findOneBy(array $criteria, array $orderBy = null)
 * @method SimpleNode[]    findAll()
 * @method SimpleNode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SimpleNodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SimpleNode::class);
    }

    // /**
    //  * @return SimpleNode[] Returns an array of SimpleNode objects
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
    public function findOneBySomeField($value): ?SimpleNode
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
