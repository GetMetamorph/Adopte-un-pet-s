<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $lastname = array("Kanouni", "Morlot", "Grums", "Beh-Rhouma", "Eddine", "Doe", "Escobar", "Smith", "Sparrow", "Gordo");
        $firstname = array("Driss", "Ivan", "Dylan", "Myhed", "Alley", "John", "Pablo", "Will", "Jack", "Eddy");
        $mail = array("dk@mail.fr", "im@mail.fr", "mb@mail.fr", "ae@mail.fr", "jd@mail.fr", "pe@mail.fr", "ws@mail.fr", "js@mail.fr", "eg@mail.fr");

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
            $manager->persist($user);
        }
        $manager->flush();
    }
}
