<?php

namespace App\Controller\API;

use App\BLL\UsuarioBLL;
use App\Controller\API\BaseApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
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

    #[Route('/auth/register', name: 'api_register', methods: ['POST'], requirements: ['_format' => 'json'], defaults: ['_format' => 'json'])]
    public function profile(UsuarioBLL $usuarioBLL)
    {
        $usuario = $usuarioBLL->profile();
        return $this->getResponse($usuario);
    }

    #[Route('/profile/password', name: 'api_profile_password', methods: ['PATCH'], requirements: ['_format' => 'json'], defaults: ['_format' => 'json'])]
    public function cambiaPassword(Request $request, UsuarioBLL $usuarioBLL)
    {
        $data = $this->getContent($request);
        if (is_null($data['password']) || !isset($data['password']) || empty($data['password']))
            throw new BadRequestHttpException('No se ha recibido el password');
        $user = $usuarioBLL->cambiaPassword($data['password']);
        return $this->getResponse($user);
    }
}
