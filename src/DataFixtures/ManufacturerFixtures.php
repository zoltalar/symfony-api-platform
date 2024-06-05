<?php

namespace App\DataFixtures;

use App\Entity\Manufacturer;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ManufacturerFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $manufacturer = new Manufacturer();
        $manufacturer->setName('ACME Corporation');
        $manufacturer->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt velit pharetra ligula faucibus ornare.');
        $manufacturer->setCountryCode('US');
        $manufacturer->setListedAt(new DateTime());
        
        $manager->persist($manufacturer);
        
        $manufacturer = new Manufacturer();
        $manufacturer->setName('Orlen');
        $manufacturer->setDescription('Sed tincidunt velit pharetra ligula faucibus ornare.');
        $manufacturer->setCountryCode('PL');
        $manufacturer->setListedAt(new DateTime());
        
        $manager->persist($manufacturer);
        $manager->flush();
    }
    
    public function getOrder(): int 
    {
        return 1;
    }
}
