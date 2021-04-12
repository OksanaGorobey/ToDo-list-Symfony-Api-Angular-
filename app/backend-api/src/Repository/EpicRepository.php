<?php

declare(strict_types=1);

namespace App\Repository;

/**
 * @method \App\Entity\Epic|null find($id, $lockMode = null, $lockVersion = null)
 * @method \App\Entity\Epic|null findOneBy(array $criteria, array $orderBy = null)
 * @method \App\Entity\Epic[]    findAll()
 * @method \App\Entity\Epic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpicRepository extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository
{
    /**
     * UserRepository constructor.
     * @param \Doctrine\Persistence\ManagerRegistry $registry
     */
    public function __construct(\Doctrine\Persistence\ManagerRegistry $registry )
    {
        parent::__construct($registry, \App\Entity\Epic::class);
    }
}