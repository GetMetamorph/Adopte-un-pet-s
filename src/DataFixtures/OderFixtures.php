<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Order;

class OrderFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime('@'.strtotime('now'));
        for($i=0; $i<20; $i++){
            $order = new Order();
            if($i < 5){
                $order->setStatus(0);//0:annulée 1:En cours de traîtement 2:Payée
            }
            else if ($i< 10){
                $order->setStatus(1);
            }
            else{
                $order->setStatus(2);//0:annulée 1:En cours de traîtement 2:Payée
            }
            $order->setDate($date);
            $manager->persist($order); 
        }
        $manager->flush();
    }
}
