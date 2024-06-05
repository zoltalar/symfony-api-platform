<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ORM\Entity]
class Manufacturer 
{
    /** Manufacturer ID */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    /** Manufacturer name */
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name;
    
    /** Manufacturer description */
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;
    
    /** Manufacturer 2 letter country code */
    #[ORM\Column(length: 2)]
    #[Assert\NotBlank]
    private ?string $countryCode;
    
    /** The date when manufacturer was listed */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $listedAt;
    
    /** Collection of products */
    #[ORM\OneToMany(
        targetEntity: Product::class, 
        mappedBy: 'manufacturer')
    ]
    private iterable $products;
    
    public function __construct() 
    {
        $this->products = new ArrayCollection();
    }
    
    // --------------------------------------------------
    // Getters and Setters
    // --------------------------------------------------
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(?string $name): static
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    public function setDescription(?string $description): static
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    
    public function setCountryCode(?string $countryCode): static
    {
        $this->countryCode = $countryCode;
        
        return $this;
    }
    
    public function getListedAt(): DateTimeInterface
    {
        return $this->listedAt;
    }
    
    public function setListedAt(DateTimeInterface $listedAt): static
    {
        $this->listedAt = $listedAt;
        
        return $this;
    }
    
    public function getProducts(): iterable
    {
        return $this->products;
    }
}
