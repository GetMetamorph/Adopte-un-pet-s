<?php

namespace App\Entity;

use App\Repository\AdoptionRequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdoptionRequestRepository::class)
 */
class AdoptionRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
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
     * @ORM\ManyToOne(targetEntity=Pet::class, inversedBy="adoptionRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $petId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="adoptionRequests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usrId;

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
        return $this->petId;
    }

    public function setPetId(?Pet $petId): self
    {
        $this->petId = $petId;

        return $this;
    }

    public function getUsrId(): ?User
    {
        return $this->usrId;
    }

    public function setUsrId(?User $usrId): self
    {
        $this->usrId = $usrId;

        return $this;
    }
}
