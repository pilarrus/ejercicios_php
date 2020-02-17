<?php

$file = 'catalog.xml';

if(file_exists($file)) {
    $xmlFile = simplexml_load_file($file);
} else {
    exit('Error al abrir '. $file);
}

$path = "/Catalog/Book[Author='Garghentini, Davide']/Author";
$array = $xmlFile->xpath($path);
$sxe = $array[0];
//var_dump($sxe);
echo $sxe;