<?php

namespace App\BLL;

use App\Entity\Categoria;
use App\Entity\Imagen;
use App\Entity\User;
use App\Repository\ImagenRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class BaseBLL
{
    protected EntityManagerInterface $em;
    protected ValidatorInterface $validator;
    protected RequestStack $requestStack;
    protected Security $security;
    protected ImagenRepository $imagenRepository;
    protected UserPasswordHasherInterface $encoder;
    protected TokenStorageInterface $tokenStorage;
    public function __construct(
        EntityManagerInterface $em,
        ValidatorInterface $validator,
        UserPasswordHasherInterface $encoder,
        RequestStack $requestStack,
        Security $security,
        ImagenRepository $imagenRepository,
        TokenStorageInterface $tokenStorage
    ) {
        $this->em = $em;
        $this->validator = $validator;
        $this->encoder = $encoder;
        $this->requestStack = $requestStack;
        $this->security = $security;
        $this->imagenRepository = $imagenRepository;
        $this->tokenStorage = $tokenStorage;
    }

    protected function guardaValidando($entity): array
    {
        $this->validate($entity); // Validación de los datos
        $this->em->persist($entity); // Se guardan los datos
        $this->em->flush();
        return $this->toArray($entity); // Devolvemos la entidad en forma de array
    }
    abstract public function toArray($entity): ?array;
    private function validate($entity)
    {
        $errors = $this->validator->validate($entity);
        if (count($errors) > 0) {
            $strError = '';
            foreach ($errors as $error) {
                if (!empty($strError))
                    $strError .= '\n';
                $strError .= $error->getMessage();
            }
            throw new BadRequestHttpException($strError);
        }
    }
    public function entitiesToArray(array $entities)
    {
        if (is_null($entities))
            return null;
        $arr = [];
        foreach ($entities as $entity)
            $arr[] = $this->toArray($entity);
        return $arr;
    }
    protected function getUser(): User
    {
        return $this->tokenStorage->getToken()->getUser();
    }
    protected function checkRoleAdmin()
    {
        $usuario = $this->getUser();
        if ($usuario->hasRole('ROLE_ADMIN') === true)
            return true;
        return false;
    }
    public function actualizaImagen(Imagen $imagen, array $data)
    {
        $imagen->setNombre($data['nombre']);
        $imagen->setDescripcion($data['descripcion']);
        $imagen->setNumVisualizaciones($data['numVisualizaciones']);
        $imagen->setNumLikes($data['numLikes']);
        $imagen->setNumDownloads($data['numDownloads']);
        // El id de la categoria, la tenemos que busar en su BBDD a partir del nombre de la seleccionada
        $categoria = $this->em->getRepository(Categoria::class)->find($data['categoria']);
        $imagen->setCategoria($categoria);
        $fecha = DateTime::createFromFormat('d/m/Y', $data['fecha']);
        $imagen->setFecha($fecha);
        $usuario = $this->getUser();
        $imagen->setUsuario($usuario);
        return $this->guardaValidando($imagen);
    }
    public function delete($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
}
