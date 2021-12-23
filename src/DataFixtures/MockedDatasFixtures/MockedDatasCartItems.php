<?php

namespace App\DataFixtures\MockedDatasFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CartItems;
use App\Entity\Cart;

abstract class MockedDatasCartItems extends Fixture {
    private array $carts;

    public function mockedDatasCartItemsFixtures(ObjectManager $manager){
        $this->carts = $this->cartRepos->findAll();
        $this->items = $this->itemRepos->findAll();
        $this->generateFakeDatasFactory($manager);
        $manager->flush();
    }
    private function initCartItemsWithBaseDatas(Cart $cart): CartItems {
        $cartItems = new CartItems();
        $cartItems->setCrtId($cart);
        $cartItems->setItmQty(1);
        return $cartItems;
    }
    private function generateFakeDatasFactory(ObjectManager $manager) {
        foreach($this->carts as $key=>$cart)
        {
            $CartItemsCompleted = $this->initCartItemsWithBaseDatas($cart);
            $manager->persist($CartItemsCompleted); 
        }
    }
}