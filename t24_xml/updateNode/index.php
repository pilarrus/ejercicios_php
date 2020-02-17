<?php

$file = 'catalog.xml';

if(file_exists($file)) {
    // xmlFile es un objeto SimpleXMLElement
    $xmlFile = simplexml_load_file($file);
} else {
    exit('Error al abrir '. $file);
}

// Asigno el nuevo dato
$xmlFile->Book[2]->Genre = 'Aventuras';
//var_dump($xmlFile->Book[2]->Genre);

// Lo guardo en el mismo fichero
$result = $xmlFile->asXML($file);

// Si lo ha guardado bien $result es true
var_dump($result);