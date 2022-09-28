<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);

        // ... e.g. get the user data from a registration form
        $user = new User();
        $user->setLastname();
        $user->setFirstname();
        $user->setMail();
        $user->setPhone();
        $user->setAdress();
        $user->setPrivilege(1); // 1 : Admin
        $user->setPassword();
        $user->setCreditCardType();
        $user->setCreditCardNumber();
        $user->setCreditCardExpirationDate();

        $plaintextPassword = ""; //Remplacer "" par la valeur récupérer dans le form d'inscription

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
    }
}
