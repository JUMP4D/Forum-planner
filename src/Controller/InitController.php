<?php

namespace App\Controller;

use App\Entity\Salarie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class InitController extends AbstractController
{
    #[Route('/init', name: 'app_init')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/InitController.php',
        ]);
    }
}
