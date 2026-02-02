<?php

namespace App\BLL;

use DateTime;
use App\Entity\User;
use App\Entity\Imagen;
use App\Entity\Categoria;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;

class ImagenBLL extends BaseBLL
{
    public function getImagenesConOrdenacion(?string $ordenacion)
    {
        if (!is_null($ordenacion)) { // Cuando se establece un tipo de ordenación específico
            $tipoOrdenacion = 'asc'; // Por defecto si no se había guardado antes en la variable de sesión
            $session = $this->requestStack->getSession(); // Abrir la sesión
            $imagenesOrdenacion = $session->get('imagenesOrdenacion');
            if (!is_null($imagenesOrdenacion)) { // Comprobamos si ya se había establecido un orden
                if ($imagenesOrdenacion['ordenacion'] === $ordenacion) // Por si se ha cambiado de campo a ordenar
                {
                    if ($imagenesOrdenacion['tipoOrdenacion'] === 'asc')
                        $tipoOrdenacion = 'desc';
                }
            }
            $session->set('imagenesOrdenacion', [ // Se guarda la ordenación actual
                'ordenacion' => $ordenacion,
                'tipoOrdenacion' => $tipoOrdenacion
            ]);
        } else { // La primera vez que se entra se establece por defecto la ordenación por id ascendente
            $ordenacion = 'id';
            $tipoOrdenacion = 'asc';
        }
        $usuarioLogueado = $this->security->getUser();
        return $this->imagenRepository->findImagenesConCategoria($ordenacion, $tipoOrdenacion, $usuarioLogueado);
    }
    public function nueva(array $data)
    {
        $imagen = new Imagen();
        return $this->actualizaImagen($imagen, $data);
    }
    public function getImagenes()
    {
        $imagenes = $this->em->getRepository(Imagen::class)->findAll();
        return $this->entitiesToArray($imagenes);
    }
    public function setRequestStack(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    public function setSecurity(Security $security)
    {
        $this->security = $security;
    }
    public function toArray($imagen): ?array
    {
        if ($imagen !== null && !$imagen instanceof Imagen) {
            return null;
        }

        if (is_null($imagen))
            return null;
        return [
            'id' => $imagen->getId(),
            'nombre' => $imagen->getNombre(),
            'descripcion' => $imagen->getDescripcion(),
            'categoria' => $imagen->getCategoria()->getNombre(),
            'numLikes' => $imagen->getNumLikes(),
            'numVisualizaciones' => $imagen->getNumVisualizaciones(),
            'numDownloads' => $imagen->getNumDownloads(),
            'fecha' => is_null($imagen->getFecha()) ? '' : $imagen->getFecha()->format('d/m/Y'),
            'usuario' => $imagen->getUsuario()->getId()
        ];
    }
}
