<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminReservationDetailController extends AbstractController
{
    #[Route('/admin/reservation/detail', name: 'admin_reservation_detail')]
    public function index(): Response
    {
        return $this->render('admin_reservation_detail/index.html.twig', [
            'controller_name' => 'AdminReservationDetailController',
        ]);
    }
}
