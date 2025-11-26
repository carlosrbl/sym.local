<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {
        $nombre = 'Carlos';
        $saludo = 'Buenos días';
        $nombres = [ 'Ana','Enrique','Laura','Pablo' ];
        return $this->render('prueba.html.twig', [
            'nombre' => $nombre,
            'saludo' => $saludo,
            'nombres' => $nombres
        ]);
    }
}
