<?php

namespace App\Entity;

use App\Repository\CatagoryShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatagoryShopRepository::class)]
class CatagoryShop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    /**
     * @var Collection<int, SweatShirts>
     */
    #[ORM\OneToMany(targetEntity: SweatShirts::class, mappedBy: 'category')]
    private Collection $sweatShirts;

    public function __toString()
    {
        return $this->name;
    }


    public function __construct()
    {
        $this->sweatShirts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, SweatShirts>
     */
    public function getSweatShirts(): Collection
    {
        return $this->sweatShirts;
    }

    public function addSweatShirt(SweatShirts $sweatShirt): static
    {
        if (!$this->sweatShirts->contains($sweatShirt)) {
            $this->sweatShirts->add($sweatShirt);
            $sweatShirt->setCategory($this);
        }

        return $this;
    }

    public function removeSweatShirt(SweatShirts $sweatShirt): static
    {
        if ($this->sweatShirts->removeElement($sweatShirt)) {
            // set the owning side to null (unless already changed)
            if ($sweatShirt->getCategory() === $this) {
                $sweatShirt->setCategory(null);
            }
        }

        return $this;
    }
}
