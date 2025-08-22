<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    #[Route('/')]
    public function users(): Response
    {
        return $this->render('users.html.twig');
    }

    #[Route('/user/{id<\d+>}', methods: ['GET'], name: 'user')]
    public function user(int $id): Response
    {
        $number = random_int(0, 100);

        return $this->render('user.html.twig', [
            'id' => $id,
        ]);
    }
}