<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Imagen;

final class ProyectoController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $imagenes = $doctrine->getRepository(Imagen::class)->findAll();
        return $this->render('index.view.html.twig', [
            'imagenes' => $imagenes
        ]);
    }
    #[Route('/about', name: 'app_about')]
    public function about()
    {
        $imagenesClientes[] = new Imagen('client1.jpg', 'MISS BELLA');
        $imagenesClientes[] = new Imagen('client2.jpg', 'DON PENO');
        $imagenesClientes[] = new Imagen('client3.jpg', 'SWEETY');
        $imagenesClientes[] = new Imagen('client4.jpg', 'LADY');

        return $this->render('about.view.html.twig', [
            'imagenes' => $imagenesClientes
        ]);
    }
    #[Route('/blog', name: 'app_blog')]
    public function blog()
    {
        return $this->render('blog.view.html.twig');
    }
    #[Route('/single_post', name: 'app_single_post')]
    public function single_post()
    {
        return $this->render('single_post.view.html.twig');
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact()
    {
        return $this->render('contact.view.html.twig');
    }
    #[Route('/registro', name: 'app_registro')]
    public function registro() {}
    #[Route('/login', name: 'app_login')]
    public function login() {}
    #[Route('/galeria', name: 'app_galeria')]
    public function galeria() {}
    #[Route('/exposiciones', name: 'app_exposiciones')]
    public function exposiciones() {}
    #[Route('/asociados', name: 'app_asociados')]
    public function asociados() {}
    #[Route('/logout', name: 'app_logout')]
    public function logout() {}
}
