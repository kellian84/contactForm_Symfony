<?php

namespace App\Repository;

use App\Entity\MailModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MailModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailModel[]    findAll()
 * @method MailModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailModel::class);
    }

    // /**
    //  * @return MailModel[] Returns an array of MailModel objects
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
    public function findOneBySomeField($value): ?MailModel
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
