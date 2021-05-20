<?php

namespace App\Entity;

use App\Repository\AssignmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssignmentRepository::class)
 */
class Assignment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $deadline;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wordcount;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="assignments")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getDeadline(): ?string
    {
        return $this->deadline;
    }

    public function setDeadline(string $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getWordcount(): ?string
    {
        return $this->wordcount;
    }

    public function setWordcount(?string $wordcount): self
    {
        $this->wordcount = $wordcount;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
