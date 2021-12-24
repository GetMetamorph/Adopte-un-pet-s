<?php

namespace App\DataFixtures\Groups;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array {
        return ['foreignKeyAdoptionRequest','foreignKeyCartItems',static::class];
    }
    public function load(ObjectManager $manager): void
    {
        $lastname = array("Kanouni", "Morlot", "Grums", "Beh-Rhouma", "Eddine", "Doe", "Escobar", "Smith", "Sparrow", "Gordo");
        $firstname = array("Driss", "Ivan", "Dylan", "Myhed", "Alley", "John", "Pablo", "Will", "Jack", "Eddy");
        $mail = array("dk@mail.fr", "im@mail.fr", "dg@mail.fr", "mb@mail.fr", "ae@mail.fr", "jd@mail.fr", "pe@mail.fr", "ws@mail.fr", "js@mail.fr", "eg@mail.fr");

        // use the factory to create a Faker\Generator instance
        $faker = Factory::create();
        
        for ($i=0; $i < count($lastname); $i++)
        { 
            $user = new User();
            $user->setLastname($lastname[$i]);
            $user->setFirstname($firstname[$i]);
            $user->setMail($mail[$i]);
            $user->setPhone("0638989585");
            $user->setAdress("21 rue des abyss, France");
            if($i < 5)// pour les 5 premier user ( membre du groupe ) on set le privilege admin
            {
                $user->setPrivilege(1); // 1 : Admin
                $user->setPassword("admin");
            }
            else
            {
                $user->setPrivilege(0); // 0 : basic user
                $user->setPassword("user");
            }
            $user->setCreditCardType($faker->creditCardType());
            $user->setCreditCardNumber($faker->creditCardNumber());
            $user->setCreditCardExpirationDate($faker->creditCardExpirationDateString());
            $manager->persist($user);
        }
        $manager->flush();
    }
}
