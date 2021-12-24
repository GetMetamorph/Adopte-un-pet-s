<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProductFormController extends AbstractController
{
    #[Route('/admin/product/form', name: 'admin_product_form')]
    public function index(): Response
    {
        return $this->render('admin_product_form/index.html.twig', [
            'controller_name' => 'AdminProductFormController',
        ]);
    }
}
