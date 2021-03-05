<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class PropertyController extends AbstractController
{
    #[Route('/property', name: 'property')]
    public function index(UserRepository $repository): Response
    {
        $user = $repository->findAll();
        dd(count($user[0]->getBiens()));

        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }
}
