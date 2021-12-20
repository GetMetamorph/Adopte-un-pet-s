<?php

namespace App\Entity;

use App\Repository\OrderItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderItemsRepository::class)
 */
class OrderItems
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=item::class, mappedBy="orderItems")
     */
    private $itm_id;

    /**
     * @ORM\OneToMany(targetEntity=order::class, mappedBy="orderItems")
     */
    private $odr_id;

    public function __construct()
    {
        $this->itm_id = new ArrayCollection();
        $this->odr_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $itmId->setOrderItems($this);
        }

        return $this;
    }

    public function removeItmId(item $itmId): self
    {
        if ($this->itm_id->removeElement($itmId)) {
            // set the owning side to null (unless already changed)
            if ($itmId->getOrderItems() === $this) {
                $itmId->setOrderItems(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|order[]
     */
    public function getOdrId(): Collection
    {
        return $this->odr_id;
    }

    public function addOdrId(order $odrId): self
    {
        if (!$this->odr_id->contains($odrId)) {
            $this->odr_id[] = $odrId;
            $odrId->setOrderItems($this);
        }

        return $this;
    }

    public function removeOdrId(order $odrId): self
    {
        if ($this->odr_id->removeElement($odrId)) {
            // set the owning side to null (unless already changed)
            if ($odrId->getOrderItems() === $this) {
                $odrId->setOrderItems(null);
            }
        }

        return $this;
    }
}
