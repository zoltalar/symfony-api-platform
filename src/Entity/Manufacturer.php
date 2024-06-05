<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[\ApiPlatform\Metadata\ApiResource]
#[ORM\Entity]
class Manufacturer 
{
    /** The ID of the manufacturer */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    /** The name of the manufacturer */
    private ?string $name;
    
    #[ORM\Column(type: 'text', nullable: true)]
    /** The description of the manufacturer */
    private ?string $description;
    
    #[ORM\Column(length: 2)]
    /** The country code of the manufacturer */
    private ?string $countryCode;
    
    #[ORM\Column(type: 'datetime', nullable: true)]
    /** The date when manufacturer was listed */
    private ?DateTimeInterface $listedAt;
    
    // --------------------------------------------------
    // Getters and Setters
    // --------------------------------------------------
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function setName(string $name): static
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
}
