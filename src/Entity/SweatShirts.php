<?php

namespace App\Entity;

use App\Repository\SweatShirtsRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Void_;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: SweatShirtsRepository::class)]
#[Vich\Uploadable]
class SweatShirts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $size = null;

    
    #[ORM\Column(length: 255 , type: 'string')]
    private ?string $attachment = null;


    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'attachment')]
    private ?File $attachmentFile = null;



    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'sweatShirts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CatagoryShop $category = null;

    #[ORM\Column]
    private ?float $price = null;

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

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(string $attachment): static
    {
        $this->attachment = $attachment;

        return $this;
    }



    
        public function getAttachmentFile(): ?File
    {
        return $this->attachmentFile;
    }

    
       public function setAttachmentFile(?File $attachmentFile = null): void
   {
        $this->attachmentFile = $attachmentFile;
        
        if (null !== $attachmentFile){}
        
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

    public function getCategory(): ?CatagoryShop
    {
        return $this->category;
    }

    public function setCategory(?CatagoryShop $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }
}
