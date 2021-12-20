<?php

namespace App\Entity;

use App\Repository\ItemCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemCategoryRepository::class)
 */
class ItemCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="itemCategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat_id;

    /**
     * @ORM\OneToMany(targetEntity=item::class, mappedBy="itemCategory")
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

    public function getCatId(): ?Category
    {
        return $this->cat_id;
    }

    public function setCatId(?Category $cat_id): self
    {
        $this->cat_id = $cat_id;

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
            $itmId->setItemCategory($this);
        }

        return $this;
    }

    public function removeItmId(item $itmId): self
    {
        if ($this->itm_id->removeElement($itmId)) {
            // set the owning side to null (unless already changed)
            if ($itmId->getItemCategory() === $this) {
                $itmId->setItemCategory(null);
            }
        }
        return $this;
    }
}
