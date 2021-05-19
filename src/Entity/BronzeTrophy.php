<?php

namespace App\Entity;

use App\Repository\BronzeTrophyRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;

/**
 * @ORM\Entity(repositoryClass=BronzeTrophyRepository::class)
 */
class BronzeTrophy
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
    private $award;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bronzeTrophies")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAward(): ?string
    {
        return $this->award;
    }

    public function setAward(string $award): self
    {
        $this->award = $award;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
    public function __toString(): string
    {
        return $this->award;
    }
}
