<?php

namespace App\Controller;

use App\Entity\Categoria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Imagen;

final class GaleriaController extends AbstractController
{
    #[Route('/galeria', name: 'app_galeria')]
    public function galeria(ManagerRegistry $doctrine): Response 
    {
        $imagenes = $doctrine->getRepository(Imagen::class)->findAll();
        $categorias = $doctrine->getRepository(Categoria::class)->findAll();
        return $this->render('galeria.view.html.twig', [
            'imagenes' => $imagenes,
            'categorias' => $categorias
        ]);
    }
    #[Route('/imagen/{id}', name: 'app_imagen_show')]
    public function show(Imagen $imagen): Response
    {
        return $this->render('imagen-show.view.html.twig', [
            'imagen' => $imagen
        ]);
    }
}
