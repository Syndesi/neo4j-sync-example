<?php

namespace App\Repository;

use App\Entity\ChildNode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChildNode|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChildNode|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChildNode[]    findAll()
 * @method ChildNode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChildNodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChildNode::class);
    }

    // /**
    //  * @return ChildNode[] Returns an array of ChildNode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChildNode
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
