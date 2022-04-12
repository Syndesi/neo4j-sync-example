<?php

namespace App\Repository;

use App\Entity\ParentNode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParentNode|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentNode|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentNode[]    findAll()
 * @method ParentNode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentNodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParentNode::class);
    }

    // /**
    //  * @return ParentNode[] Returns an array of ParentNode objects
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
    public function findOneBySomeField($value): ?ParentNode
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
