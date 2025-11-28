<?php

namespace App\Utils;

class Utils
{
    public static function esOpcionMenuActiva($opcion): bool
    {
        $actual = explode('/', $_SERVER['REQUEST_URI']);
        $actual = '/' . $actual[count($actual) - 1];
        if ($actual === $opcion) {
            return true;
        } else {
            return false;
        }
    }
    public static function extraeElementosAleatorios($lista, $cantidad): ?array
    {
        if ($cantidad < 1 || sizeof($lista) == 0) return null;
        else {
            shuffle($lista);
            // Obtenemos un array de fragmentos de tamaño $cantidad del array pasado
            $listaNueva = array_chunk($lista, $cantidad);
            return $listaNueva[0]; // Devolvemos el primer fragmento del array
        }
    }
}
