#!/usr/bin/env php
<?php

require_once 'vendor/autoload.php';

use juliocsimoesp\BuscadorCursos\Buscador;

$buscador = new Buscador('https://www.alura.com.br/');

$cursos = $buscador->buscarCursos('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
