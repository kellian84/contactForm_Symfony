<?php

namespace App\Repository;

use App\Entity\ContactModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactModel[]    findAll()
 * @method ContactModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactModel::class);
    }
    
}
