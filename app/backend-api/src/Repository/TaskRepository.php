<?php

declare(strict_types=1);

namespace App\Repository;

/**
 * @method \App\Entity\Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method \App\Entity\Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method \App\Entity\Task[]    findAll()
 * @method \App\Entity\Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskRepository extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository
{
    /**
     * UserRepository constructor.
     * @param \Doctrine\Persistence\ManagerRegistry $registry
     */
    public function __construct(\Doctrine\Persistence\ManagerRegistry $registry )
    {
        parent::__construct($registry, \App\Entity\Task::class);
    }
}