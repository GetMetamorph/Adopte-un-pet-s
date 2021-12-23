<?php

namespace App\DataFixtures\MockedDatasFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cart;
use App\Entity\User;

abstract class MockedDatasCart extends Fixture {

    public function mockedDatasCartFixtures(ObjectManager $manager){
        $this->users = $this->reposUser->findAll();
        $this->generateFakeDatasFactory($manager);
        $manager->flush();
    }

    private function initCartWithBaseDatas(int $keyUser, User $user): Cart {
        $date = new \DateTime('@'.strtotime('now'));
        $cart = new Cart();
        $cart->setUsrId($user);
        $cart->setStatus(0);
        $cart->setDate($date);
        
        return $cart;
    }
    
    private function generateFakeDatasFactory(ObjectManager $manager) {
        foreach($this->users as $key=>$user)
        {
            $cartCompleted = $this->initCartWithBaseDatas($key, $user);
            $manager->persist($cartCompleted); 
        }
    }
}