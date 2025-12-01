<?php

namespace App\Controller;

use App\Entity\Imagen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProyectoController extends AbstractController
{
    #[Route('/', name: 'sym_index')]
    public function index()
    {
        $imagenesHome[] = new Imagen('1.jpg', 'descripción imagen 1', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('2.jpg', 'descripción imagen 2', 1, 600, 610, 130);
        $imagenesHome[] = new Imagen('3.jpg', 'descripción imagen 3', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('4.jpg', 'descripción imagen 4', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('5.jpg', 'descripción imagen 5', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('6.jpg', 'descripción imagen 6', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('7.jpg', 'descripción imagen 7', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('8.jpg', 'descripción imagen 8', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('9.jpg', 'descripción imagen 9', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('10.jpg', 'descripción imagen 10', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('11.jpg', 'descripción imagen 11', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('12.jpg', 'descripción imagen 12', 1, 456, 610, 130);

        return $this->render('index.view.html.twig', [
            'imagenes' => $imagenesHome
        ]);
    }
    #[Route('/about', name: 'sym_about')]
    public function about() {}
    #[Route('/registro', name: 'sym_registro')]
    public function registro() {}
    #[Route('/login', name: 'sym_login')]
    public function login() {}
    #[Route('/galeria', name: 'sym_galeria')]
    public function galeria() {}
    #[Route('/exposiciones', name: 'sym_exposiciones')]
    public function exposiciones() {}
    #[Route('/asociados', name: 'sym_asociados')]
    public function asociados() {}
    #[Route('/logout', name: 'sym_logout')]
    public function logout() {}
    #[Route('/blog', name: 'sym_blog')]
    public function blog() {}
    #[Route('/contact', name: 'sym_contact')]
    public function contact() {}
}
