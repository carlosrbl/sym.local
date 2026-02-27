<?php

namespace App\Controller\API;

use App\BLL\UsuarioBLL;
use App\Controller\API\BaseApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class UsuarioApiCotroller extends BaseApiController
{
    #[Route('/auth/register', name: 'api_register', methods: ['POST'])]
    public function register(Request $request, UsuarioBLL $userBLL)
    {
        $data = $this->getContent($request);
        $user = $userBLL->nuevo($data['username'], $data['email'], $data['password']);
        return $this->getResponse($user, Response::HTTP_CREATED);
    }

    /**
     * @Route("/profile.{_format}",
     * name="profile",
     * requirements={"_format": "json"},
     * defaults={"_format": "json"},
     * methods={"GET"}
     * )
     */
    public function profile(UsuarioBLL $usuarioBLL)
    {
        $usuario = $usuarioBLL->profile();
        return $this->getResponse($usuario);
    }
}
