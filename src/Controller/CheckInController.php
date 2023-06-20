<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckInController extends AbstractController
{
    #[Route('/', name: 'app_check_in')]
    public function index(): Response
    {
        return $this->render('check_in/index.html.twig');
    }
}
