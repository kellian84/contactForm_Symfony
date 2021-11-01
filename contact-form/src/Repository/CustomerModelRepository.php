<?php

namespace App\Repository;

use App\Entity\CustomerModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerModel[]    findAll()
 * @method CustomerModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerModelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerModel::class);
    }

    public function getIdByEmail(string $email): array
    {
        $entityManager = $this->getEntityManager();
        $id_user = array();

        $id_mail = $this->getIdMailByEmail($email);
        if(!empty($id_mail))
        {
            $query = $entityManager->createQuery(
                   'SELECT c.id
                   FROM App\Entity\CustomerModel c
                   WHERE c.mail =  :mail_id
                   ORDER BY c.id DESC'
               )
                   ->setParameter('mail_id', $id_mail[0]['id'])
                   ->setMaxResults(1);

               // returns an array of Product objects
               return $query->getResult();
        }
        else
        {
            return $id_user;
        }
    }

    public function getIdMailByEmail(string $email): array
    {
        $entityManager = $this->getEntityManager();
        $id_user = array();
        $id_mail = $entityManager->createQuery(
            'SELECT m.id
                FROM App\Entity\MailModel m
                WHERE m.email =  :email'
        )
            ->setParameter('email', $email)
            ->setMaxResults(1);
        return $id_mail->getResult();

    }
}
