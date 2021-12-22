<?php

namespace App\DataFixtures\MockedDatasFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\AdoptionRequest;
use App\Entity\User;


abstract class MockedDatasAdoptionRequest extends Fixture {
    private array $users;
    private array $pets;
    private array $status = array("Pending", "Adopted");
    private int $counter = 0;
    
    public function mockedDatasAdoptionRequestFixtures(ObjectManager $manager){
        $this->users = $this->reposUser->findAll();
        $this->pets = $this->reposPet->findAll(); // récupère toutes les catégories
        $this->generateFakeDatasFactory($manager);
        $manager->flush();
    }

    private function initAdoptionRequestWithBaseDatas(int $keyUser, User $user): AdoptionRequest {
        $date = new \DateTime('@'.strtotime('now'));
        $adoption = new AdoptionRequest();
        $adoption->setPetId($this->pets[$keyUser]);
        $adoption->setUsrId($user);
        $adoption->setDocumentPath("assets/documents/file.pdf");
        $adoption->setDate($date);
        $adoption->setStatus($this->handleStatusAdoptionRequest($keyUser));
        
        return $adoption;
    }
    private function handleStatusAdoptionRequest(int $petId): string {
        if ($this->counter <= (count($this->pets)-1)){
            $this->counter = $this->counter + 4;
            return $this->status[0];
        }
        return $this->status[1];
    }
    private function generateFakeDatasFactory(ObjectManager $manager) {
        foreach($this->users as $key=>$user)
        {
            $adoptionCompleted = $this->initAdoptionRequestWithBaseDatas($key, $user);
            $manager->persist($adoptionCompleted); 
        }
    }
}