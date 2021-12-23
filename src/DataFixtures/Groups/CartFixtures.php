<?php

namespace App\DataFixtures\Groups;
use Doctrine\Persistence\ObjectManager;
use App\Repository\UserRepository;
use App\DataFixtures\MockedDatasFixtures\MockedDatasCart;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class CartFixtures extends MockedDatasCart implements FixtureGroupInterface
{
    public static function getGroups(): array {
        return ['foreignKeyCartItems', static::class];
    }

    public function __construct(UserRepository $reposUser)
    {
        $this->reposUser = $reposUser;
    }

    public function load(ObjectManager $manager): void
    {
        $this->mockedDatasCartFixtures($manager);
    }
}
