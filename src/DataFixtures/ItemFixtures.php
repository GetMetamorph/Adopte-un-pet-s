<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Item;
use Faker\Factory;
use App\Repository\CategoryRepository;

class ItemFixtures extends Fixture
{
    public function __construct(CategoryRepository $repos)
    {
        $this->repos = $repos;
    }

    public function load(ObjectManager $manager): void
    {
        $category = $this->repos->findAll(); // récupère toutes les catégories

        // use the factory to create a Faker\Generator instance
        $faker = Factory::create();

        //for($i=0; $i<count($category); $i++){
        foreach($category as $cat){

            $item = new Item();
            $item->setName($faker->word());
            $item->setPrice($faker->randomDigit());
            $item->setImage("assets/image.png");
            $item->setDescription($faker->sentence());
            $item->setItemCategory($cat);

            $manager->persist($item); 
        }
        $manager->flush();
    }
}
