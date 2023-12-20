<?php

namespace App\Entity;

use App\Repository\AcademicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcademicRepository::class)
 */
class Academic implements \JsonSerializable 
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
    private $degree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $institution;

    /**
     * @ORM\Column(type="date")
     */
    private $year;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="academics")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(string $institution): self
    {
        $this->institution = $institution;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'degree' => $this->degree,
            'institution' => $this->institution,
            'year' => $this->year->format('Y-m-d'),
            'description' => $this->description,
        ];
    }

    
}
