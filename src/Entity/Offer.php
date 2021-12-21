<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $documentPath;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Pet::class, inversedBy="offers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pet_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="offers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usr_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDocumentPath(): ?string
    {
        return $this->documentPath;
    }

    public function setDocumentPath(string $documentPath): self
    {
        $this->documentPath = $documentPath;

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

    public function getPetId(): ?Pet
    {
        return $this->pet_id;
    }

    public function setPetId(?Pet $pet_id): self
    {
        $this->pet_id = $pet_id;

        return $this;
    }

    public function getUsrId(): ?User
    {
        return $this->usr_id;
    }

    public function setUsrId(?User $usr_id): self
    {
        $this->usr_id = $usr_id;

        return $this;
    }
}
