<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=BronzeTrophy::class, mappedBy="user")
     */
    private $bronzeTrophies;

    /**
     * @ORM\OneToMany(targetEntity=SilverTrophy::class, mappedBy="user")
     */
    private $silverTrophies;

    /**
     * @ORM\OneToMany(targetEntity=GoldTrophy::class, mappedBy="user")
     */
    private $goldTrophies;

    /**
     * @ORM\OneToMany(targetEntity=Subject::class, mappedBy="user")
     */
    private $subjects;

    /**
     * @ORM\OneToMany(targetEntity=Assignment::class, mappedBy="user")
     */
    private $assignments;

    public function __construct()
    {
        $this->trophies = new ArrayCollection();
        $this->bronzeTrophies = new ArrayCollection();
        $this->silverTrophies = new ArrayCollection();
        $this->goldTrophies = new ArrayCollection();
        $this->subjects = new ArrayCollection();
        $this->assignments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        return [$this->role];
    }


    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|BronzeTrophy[]
     */
    public function getBronzeTrophies(): Collection
    {
        return $this->bronzeTrophies;
    }

    public function addBronzeTrophy(BronzeTrophy $bronzeTrophy): self
    {
        if (!$this->bronzeTrophies->contains($bronzeTrophy)) {
            $this->bronzeTrophies[] = $bronzeTrophy;
            $bronzeTrophy->setUser($this);
        }

        return $this;
    }

    public function removeBronzeTrophy(BronzeTrophy $bronzeTrophy): self
    {
        if ($this->bronzeTrophies->removeElement($bronzeTrophy)) {
            // set the owning side to null (unless already changed)
            if ($bronzeTrophy->getUser() === $this) {
                $bronzeTrophy->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SilverTrophy[]
     */
    public function getSilverTrophies(): Collection
    {
        return $this->silverTrophies;
    }

    public function addSilverTrophy(SilverTrophy $silverTrophy): self
    {
        if (!$this->silverTrophies->contains($silverTrophy)) {
            $this->silverTrophies[] = $silverTrophy;
            $silverTrophy->setUser($this);
        }

        return $this;
    }

    public function removeSilverTrophy(SilverTrophy $silverTrophy): self
    {
        if ($this->silverTrophies->removeElement($silverTrophy)) {
            // set the owning side to null (unless already changed)
            if ($silverTrophy->getUser() === $this) {
                $silverTrophy->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|GoldTrophy[]
     */
    public function getGoldTrophies(): Collection
    {
        return $this->goldTrophies;
    }

    public function addGoldTrophy(GoldTrophy $goldTrophy): self
    {
        if (!$this->goldTrophies->contains($goldTrophy)) {
            $this->goldTrophies[] = $goldTrophy;
            $goldTrophy->setUser($this);
        }

        return $this;
    }

    public function removeGoldTrophy(GoldTrophy $goldTrophy): self
    {
        if ($this->goldTrophies->removeElement($goldTrophy)) {
            // set the owning side to null (unless already changed)
            if ($goldTrophy->getUser() === $this) {
                $goldTrophy->setUser(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->email;
    }

    /**
     * @return Collection|Subject[]
     */
    public function getSubjects(): Collection
    {
        return $this->subjects;
    }

    public function addSubject(Subject $subject): self
    {
        if (!$this->subjects->contains($subject)) {
            $this->subjects[] = $subject;
            $subject->setUser($this);
        }

        return $this;
    }

    public function removeSubject(Subject $subject): self
    {
        if ($this->subjects->removeElement($subject)) {
            // set the owning side to null (unless already changed)
            if ($subject->getUser() === $this) {
                $subject->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Assignment[]
     */
    public function getAssignments(): Collection
    {
        return $this->assignments;
    }

    public function addAssignment(Assignment $assignment): self
    {
        if (!$this->assignments->contains($assignment)) {
            $this->assignments[] = $assignment;
            $assignment->setUser($this);
        }

        return $this;
    }

    public function removeAssignment(Assignment $assignment): self
    {
        if ($this->assignments->removeElement($assignment)) {
            // set the owning side to null (unless already changed)
            if ($assignment->getUser() === $this) {
                $assignment->setUser(null);
            }
        }

        return $this;
    }
}
