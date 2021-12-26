<?php

namespace App\Entity;

use App\Repository\PetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PetRepository::class)
 */
class Pet
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
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $species;

    /**
     * @ORM\Column(type="date")
     */
    private $joinedDate;

    /**
     * @ORM\Column(type="float")
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity=AdoptionRequest::class, mappedBy="petId", orphanRemoval=true)
     */
    private $adoptionRequests;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
        $this->adoptionRequests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getJoinedDate(): ?\DateTimeInterface
    {
        return $this->joinedDate;
    }

    public function setJoinedDate(\DateTimeInterface $joinedDate): self
    {
        $this->joinedDate = $joinedDate;

        return $this;
    }

    public function getAge(): ?float
    {
        return $this->age;
    }

    public function setAge(float $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|AdoptionRequest[]
     */
    public function getAdoptionRequests(): Collection
    {
        return $this->adoptionRequests;
    }

    public function addAdoptionRequest(AdoptionRequest $adoptionRequest): self
    {
        if (!$this->adoptionRequests->contains($adoptionRequest)) {
            $this->adoptionRequests[] = $adoptionRequest;
            $adoptionRequest->setPetId($this);
        }

        return $this;
    }

    public function removeAdoptionRequest(AdoptionRequest $adoptionRequest): self
    {
        if ($this->adoptionRequests->removeElement($adoptionRequest)) {
            // set the owning side to null (unless already changed)
            if ($adoptionRequest->getPetId() === $this) {
                $adoptionRequest->setPetId(null);
            }
        }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
