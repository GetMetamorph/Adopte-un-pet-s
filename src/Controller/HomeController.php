<?php

namespace App\Controller;

use App\Entity\Pet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\PetRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public function __construct(PetRepository $petRepos)
    {   
        $this->petRepos = $petRepos;   
    }

    #[Route('/pet/{id}', name: 'pet', methods: ['GET'])]
    public function petById(Pet $pet): Response {
        // $attributes = $request->attributes->;
        // $pet = $this->petRepos->findById();
        return $this->render('home/index.html.twig', ['pet' => $pet]);
    }

    #[Route('/home', name: 'home')]
    public function index(LoggerInterface $logger): Response
    {
        $logger->info('toto');
        $logger->info(json_encode($this->petRepos->findBy(
            array(),        // $where 
            array('joinedDate' => 'DESC'),    // $orderBy
            30,                        // $limit
            0                          // $offset
          )));
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'pets' => $this->petRepos->findBy(
                array(),        // $where 
                array('joinedDate' => 'DESC'),    // $orderBy
                30,                        // $limit
                0                          // $offset
              )]);
    }
}