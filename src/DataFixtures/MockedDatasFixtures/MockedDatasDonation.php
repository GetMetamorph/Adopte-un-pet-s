<?php

namespace App\DataFixtures\MockedDatasFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Donation;
use App\Entity\User;
use Faker\Factory;

abstract class MockedDatasDonation extends Fixture {

    public function mockedDatasDonationFixtures(ObjectManager $manager){
        $this->users = $this->reposUser->findAll();
        $this->generateFakeDatasFactory($manager);
        $manager->flush();
    }

    private function initDonationWithBaseDatas(int $keyUser, User $user): Donation {
        $faker = Factory::create();

        $date = new \DateTime('@'.strtotime('now'));
        $donation = new Donation();
        $donation->setAmount($faker->randomFloat(2));
        $donation->setUser($user);
        $donation->setDate($date);
        
        return $donation;
    }
    
    private function generateFakeDatasFactory(ObjectManager $manager) {
        foreach($this->users as $key=>$user)
        {
            $donationCompleted = $this->initDonationWithBaseDatas($key, $user);
            $manager->persist($donationCompleted); 
        }
    }
}