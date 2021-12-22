<?php

namespace App\DataFixtures\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $catName = array("Alimentation", "Litière", "Accessoire");
        for($i=0; $i<count($catName); $i++)
        {
            $category = new Category();
            $category->setName($catName[$i]);
            $manager->persist($category); 
        }
        $manager->flush();
    }
}
