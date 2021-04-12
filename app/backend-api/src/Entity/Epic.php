<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="epic")
 * @ORM\Entity(repositoryClass="App\Repository\EpicRepository")
 */
class Epic
{
    public function __construct()
    {
//        $this->tasks = new ArrayCollection();
        $this->setStatus(1);
        $this->setCreatedAt(new \DateTime('now'));
    }
    
    /**
     * @var int|null
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     */
    private string $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private \DateTime $createdAt;

    /**
     * @var int

     * @ORM\Column(name="status", type="integer", options={"default": 1})
     */
    private int $status;

//    /**
//     * @var ArrayCollection|Task
//     *
//     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="epic")
//     */
//    private ArrayCollection|Task $tasks;
//
//    /**
//     * @return Collection|Task[]
//     */
//    public function getTasks(): Collection
//    {
//        return $this->tasks;
//    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle( string $title ): void
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt( \DateTime $createdAt ): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus( int $status ): void
    {
        $this->status = $status;
    }
}