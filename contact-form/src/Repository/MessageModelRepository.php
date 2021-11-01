<?php

namespace App\Repository;

use App\Entity\MessageModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MessageModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageModel[]    findAll()
 * @method MessageModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageModel::class);
    }

    // /**
    //  * @return MessageModel[] Returns an array of MessageModel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MessageModel
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
