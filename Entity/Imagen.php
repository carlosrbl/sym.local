<?php

namespace App\Entity;

use App\Entity\IEntity;

class Imagen implements IEntity
{
    const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/';
    const RUTA_IMAGENES_GALERIA = '/public/images/index/gallery/';
    const RUTA_IMAGENES_CLIENTES = '/public/images/clients/';
    const RUTA_IMAGENES_SUBIDAS = '/public/images/subidas/';

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @var int
     */
    private $categoria;
    /**
     * @var int
     */
    private $numVisualizaciones;
    /**
     * @var int
     */
    private $numLikes;
    /**
     * @var int
     */
    private $numDownloads;

    public function __construct($nombre = "", $descripcion = "", $categoria = 1, $numVisualizaciones = 0, $numLikes = 0, $numDownloads = 0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads(),
            'categoria' => $this->getCategoria()
        ];
    }
    /**
     * @return int
     */
    public function getID(): ?int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }
    /**
     * @param $nombre
     * @return Imagen
     */
    public function setNombre($nombre): Imagen
    {
        $this->nombre = $nombre;
        return $this;
    }
    /**
     * @return string
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }
    /**
     * @param $descripcion
     * @return Imagen
     */
    public function setDescripcion($descripcion): Imagen
    {
        $this->descripcion = $descripcion;
        return $this;
    }
    /**
     * @return int
     */
    public function getCategoria(): ?int
    {
        return $this->categoria;
    }
    /**
     * @param $categoria
     * @return Imagen
     */
    public function setCategoria($categoria): Imagen
    {
        $this->categoria = $categoria;
        return $this;
    }
    /**
     * @return int
     */
    public function getNumVisualizaciones(): ?int
    {
        return $this->numVisualizaciones;
    }
    /**
     * @param $numVisualizaciones
     * @return Imagen
     */
    public function setNumVisualizaciones($numVisualizaciones): Imagen
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }
    /**
     * @return int
     */
    public function getNumLikes(): ?int
    {
        return $this->numLikes;
    }
    /**
     * @param $numLikes
     * @return Imagen
     */
    public function setNumLikes($numLikes): Imagen
    {
        $this->numLikes = $numLikes;
        return $this;
    }
    /**
     * @return int
     */
    public function getNumDownloads(): ?int
    {
        return $this->numDownloads;
    }
    /**
     * @param $numDownloads
     * @return Imagen
     */
    public function setNumDownloads($numDownloads): Imagen
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }
    public function __toString(): string
    {
        return $this->descripcion;
    }
    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }
    public function getUrlGaleria(): string
    {
        return self::RUTA_IMAGENES_GALERIA . $this->getNombre();
    }
    public function getUrlClientes(): string
    {
        return self::RUTA_IMAGENES_CLIENTES . $this->getNombre();
    }
    public function getUrlSubidas(): string
    {
        return self::RUTA_IMAGENES_SUBIDAS . $this->getNombre();
    }
}
