<?php

namespace App\DataFixtures\Groups;


use Doctrine\Persistence\ObjectManager;
use App\Repository\PetRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use App\DataFixtures\MockedDatasFixtures\MockedDatasAdoptionRequest;

class AdoptionRequestFixtures extends MockedDatasAdoptionRequest implements FixtureGroupInterface
{
    public static function getGroups(): array {
        return ['foreignKeyAdoptionRequest', static::class];
    }
    public function __construct(PetRepository $reposPet, UserRepository $reposUser)
    {
        $this->reposPet = $reposPet;
        $this->reposUser = $reposUser;
    }

    public function load(ObjectManager $manager): void
    {
        $this->mockedDatasAdoptionRequestFixtures($manager);
    }
}