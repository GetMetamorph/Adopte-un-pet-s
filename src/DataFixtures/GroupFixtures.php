<?php

namespace App\DataFixtures;
use App\DataFixtures\Groups\PetFixtures;
use App\DataFixtures\Groups\UserFixtures;
use App\DataFixtures\Groups\AdoptionRequestFixtures;
use App\DataFixtures\Groups\CartFixtures;
use App\DataFixtures\Groups\CartItemsFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends Fixture implements DependentFixtureInterface {
    public function load(ObjectManager $manager){}
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            PetFixtures::class,
            Donation::class,
            AdoptionRequestFixtures::class,
            CartFixtures::class,
            CartItemsFixtures::class
        ];
    }
}