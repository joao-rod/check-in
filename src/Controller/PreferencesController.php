<?php

namespace App\Controller;

use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PreferencesController extends AbstractController
{
    #[Route('/preferences', name: 'app_preferences')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $user->setPassword(
        //         $userPasswordHasher->hashPassword(
        //             $user,
        //             $form->get('plainPassword')->getData()
        //         )
        //     );
        return $this->render('preferences/index.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
