<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminReservationsController extends AbstractController
{
    #[Route('/admin/reservations', name: 'admin_reservations')]
    public function index(): Response
    {
        return $this->render('admin_reservations/index.html.twig', [
            'controller_name' => 'AdminReservationsController',
        ]);
    }
}
