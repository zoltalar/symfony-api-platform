<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity]
class Product
{
    /** Product ID */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    /** Product name */
    #[ORM\Column(length: 255)]
    private ?string $name;
    
    /** Product MPN (Manufacturer Part Number) */
    #[ORM\Column(length: 100)]
    private ?string $mpn;
    
    /** Product description */
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;
    
    /** The date when product was issued */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $issuedAt;
    
    /** Manufacturer of the product */
    #[ORM\ManyToOne(
        targetEntity: Manufacturer::class, 
        inversedBy: 'products'
    )]
    private ?Manufacturer $manufacturer;
    
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
    
    public function getMpn(): ?string
    {
        return $this->mpn;
    }
    
    public function setMpn(?string $mpn): static
    {
        $this->mpn = $mpn;
        
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
    
    public function getIssuedAt(): DateTimeInterface
    {
        return $this->issuedAt;
    }
    
    public function setIssuedAt(DateTimeInterface $issuedAt): static
    {
        $this->issuedAt = $issuedAt;
        
        return $this;
    }
}
