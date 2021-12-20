<?php

namespace App\Entity;

use App\Repository\CartItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartItemsRepository::class)
 */
class CartItems
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=cart::class, inversedBy="cartItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $crt_id;

    /**
     * @ORM\OneToMany(targetEntity=item::class, mappedBy="cartItems")
     */
    private $itm_id;

    public function __construct()
    {
        $this->itm_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrtId(): ?cart
    {
        return $this->crt_id;
    }

    public function setCrtId(?cart $crt_id): self
    {
        $this->crt_id = $crt_id;

        return $this;
    }

    /**
     * @return Collection|item[]
     */
    public function getItmId(): Collection
    {
        return $this->itm_id;
    }

    public function addItmId(item $itmId): self
    {
        if (!$this->itm_id->contains($itmId)) {
            $this->itm_id[] = $itmId;
            $itmId->setCartItems($this);
        }

        return $this;
    }

    public function removeItmId(item $itmId): self
    {
        if ($this->itm_id->removeElement($itmId)) {
            // set the owning side to null (unless already changed)
            if ($itmId->getCartItems() === $this) {
                $itmId->setCartItems(null);
            }
        }

        return $this;
    }
}
