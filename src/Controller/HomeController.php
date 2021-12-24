<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\PetRepository;
use Psr\Log\LoggerInterface;

class HomeController extends AbstractController
{
    public function __construct(PetRepository $petRepos)
    {   
        $this->petRepos = $petRepos;   
    }
    #[Route('/home', name: 'home')]
    public function index(LoggerInterface $logger): Response
    {
        $logger->info('toto');
        $logger->info(json_encode($this->petRepos->findAll()));
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'pets' => $this->petRepos->findAll()
        ]);
    }
}