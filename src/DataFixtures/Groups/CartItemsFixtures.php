<?php

namespace App\DataFixtures\Groups;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CartRepository;
use App\Repository\ItemRepository;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

use App\DataFixtures\MockedDatasFixtures\MockedDatasCartItems;

class CartItemsFixtures extends MockedDatasCartItems implements FixtureGroupInterface {
    public static function getGroups(): array {
        return ['foreignKeyCartItems', static::class];
    }
    public function __construct(ItemRepository $itemRepos, CartRepository $cartRepos)
    {
        $this->itemRepos = $itemRepos;
        $this->cartRepos = $cartRepos;
    }
    public function load(ObjectManager $manager){
        $this->mockedDatasCartItemsFixtures($manager);
    }
}