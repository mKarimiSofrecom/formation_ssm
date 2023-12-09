<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $comment;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="user_to", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_from;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="review", cascade={"persist", "remove"})
     */
    private $user_to;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUserFrom(): ?User
    {
        return $this->user_from;
    }

    public function setUserFrom(User $user_from): self
    {
        $this->user_from = $user_from;

        return $this;
    }

    public function getUserTo(): ?User
    {
        return $this->user_to;
    }

    public function setUserTo(?User $user_to): self
    {
        $this->user_to = $user_to;

        return $this;
    }
}
