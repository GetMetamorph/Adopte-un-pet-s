<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use App\Entity\Pet;

class AppFixtures extends Fixture
{
    /**
    * @var string A "Y-m-d H:i:s" formatted value
    */
    protected $createdAt;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('createdAt', new Assert\DateTime());
    }

    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime('@'.strtotime('now'));
        //$date = date_create_from_format('d-m-y', '');
        //$product = new Product();
        //$manager->persist($product);
        //$random  = function($arr) {return $arr[array_rand($arr)];};
        $species = array("Chat", "Chien", "Hamster");
        for ($i=0; $i < count($species); $i++) {  // pour chaque espèce dans l'array species
            for($j=1; $j<11; $j++){ // on fait 10 animaux different
                $pet = new Pet();
                $pet->setName($species[$i]." n°$j"); // ex : Chat n°1
                $pet->setSpecies($species[$i]);
                $pet->setJoinedDate($date);
                $pet->setAge($j);

                $manager->persist($pet);
            }
                /*
                for ($j=1; $j < 11; $j++) { 
                    $post = new Post();
                    $post->setTitle("Article n°". $i * $j);
                    $post->setContent("Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, voluptatem ut eveniet alias quibusdam fugiat. Porro necessitatibus totam in earum minus dolor nostrum vitae, impedit temporibus nesciunt optio error ut?
                    Exercitationem voluptas, enim obcaecati magnam possimus debitis nostrum magni impedit similique molestias rerum, eum corporis provident delectus optio eligendi totam aliquam iste culpa? Incidunt quidem nisi dolorem soluta voluptatibus omnis?
                    At non cupiditate, dolorum veritatis quibusdam ullam nihil id quidem, nesciunt consequuntur rerum, iure molestiae eum sequi sit veniam maxime temporibus eos tempore. Molestiae repudiandae voluptate officiis, quam dolor unde.");
                    $post->setCreatedAt(new \DateTime());
                    $post->setCategory($pet);
                    $manager->persist($post);
                }
                */
        }
        $manager->flush();
    }
}
