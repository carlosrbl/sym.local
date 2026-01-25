<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // Obtener el error de login si existe
        $error = $authenticationUtils->getLastAuthenticationError();
        // Último nombre de usuario ingresado
        $lastUsername = $authenticationUtils->getLastUsername();

        // NOTA: Eliminamos las líneas de $verifyEmailError y $success aquí.
        // Se manejarán directamente en Twig.

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController', // Opcional
            'last_username' => $lastUsername,
            'error' => $error,
            // Ya no pasamos 'verify_email_error' ni 'success' aquí
        ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout(): void
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
