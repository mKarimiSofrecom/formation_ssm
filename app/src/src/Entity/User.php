<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JsonSerializable;
use Monolog\Logger;

/**
 * [UniqueEntity('email')]
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface,JsonSerializable
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
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $piographie;

    

    

    /**
     * @ORM\OneToOne(targetEntity=Review::class, mappedBy="user_from", cascade={"persist", "remove"})
     */
    private $user_to;

    /**
     * @ORM\OneToOne(targetEntity=Review::class, mappedBy="user_to", cascade={"persist", "remove"})
     */
    private $review;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, mappedBy="user")
     */
    private $skills;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity=Academic::class, mappedBy="user")
     */
    private $academics;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="user")
     */
    private $experiences;

   


    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->academics = new ArrayCollection();
        $this->experiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getJop(): ?string
    {
        return $this->jop;
    }

    public function setJop(?string $jop): self
    {
        $this->jop = $jop;

        return $this;
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getPiographie(): ?string
    {
        return $this->piographie;
    }

    public function setPiographie(string $piographie): self
    {
        $this->piographie = $piographie;

        return $this;
    }

  

   

    

    public function getUserTo(): ?Review
    {
        return $this->user_to;
    }

    public function setUserTo(Review $user_to): self
    {
        // set the owning side of the relation if necessary
        if ($user_to->getUserFrom() !== $this) {
            $user_to->setUserFrom($this);
        }

        $this->user_to = $user_to;

        return $this;
    }

    public function getReview(): ?Review
    {
        return $this->review;
    }

    public function setReview(?Review $review): self
    {
        // unset the owning side of the relation if necessary
        if ($review === null && $this->review !== null) {
            $this->review->setUserTo(null);
        }

        // set the owning side of the relation if necessary
        if ($review !== null && $review->getUserTo() !== $this) {
            $review->setUserTo($this);
        }

        $this->review = $review;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->addUser($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            $skill->removeUser($this);
        }

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection<int, Academic>
     */
    public function getAcademics(): Collection
    {
        return $this->academics;
    }

    public function addAcademic(Academic $academic): self
    {
        if (!$this->academics->contains($academic)) {
            $this->academics[] = $academic;
            $academic->addUser($this);
        }

        return $this;
    }

    public function removeAcademic(Academic $academic): self
    {
        if ($this->academics->removeElement($academic)) {
            $academic->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setUser($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getUser() === $this) {
                $experience->setUser(null);
            }
        }

        return $this;
    }


    

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
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
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
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
    
    /**
     * Serializes the User object to JSON.
     *
     * @return array The serialized User object.
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'fullname' => $this->getFullname(),
            'jop' => $this->getJop(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'adress' => $this->getAdress(),
            'birthday' => $this->getBirthday(),
            'piographie' => $this->getPiographie(),
            'picture' => $this->getPicture(),
            'academics' => $this->getAcademics()->toArray() ,
            'experiences' => $this->getExperiences()->toArray() ,
            'skills' => $this->getSkills()->toArray() ,
            //'review' => $this->getReview(),
            // 'user_to' => $this->getUserTo(),
            // 'roles' => $this->getRoles(),
        ];
    }
    public function __toString()
    {
        return $this->getFullname();
    }

    
   
}
