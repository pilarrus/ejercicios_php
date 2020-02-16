<?php

$refBook = [
    'id' => 'bk103',
    'Author' => 'J.K.Rowling',
    'Title' => 'Harry Potter y la piedra Fisolofal',
    'Genre' => 'Ficción',
    'Price' => '12.99',
    'PublishDate' => '1995-02-01',
    'Description' => 'Un joven mago...'
];

// Copia el xml existente
function copiarXML($sxe, $array) {
    foreach ($array as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $book = $sxe->addChild($key);
            //echo $key, '<br>';
            foreach ($value2 as $key3 => $value3) {
                if(isset($value3['id'])) {
                    $id = $value3['id'];
                    //echo $id, '<br>';
                    $book->addAttribute('id', $id);
                } else {
                    //echo $key3 . " " . $value3 . '<br>';
                    $book->addChild($key3, $value3);
                }
            }
        }
    }
    return $sxe;
}

// Añade un nuevo nodo al xml que he copiado
function añadirNuevoNodo($sxe, $refBook) {
    $book = $sxe->addChild('Book');

    foreach ($refBook as $key => $value) {
        if($key == 'id') {
            $book->addAttribute($key, $value);
        } else {
            $book->addChild($key, $value);
        }
    }
    return $sxe;
}

if (file_exists('catalog.xml')) {
    $xmlFile = simplexml_load_file('catalog.xml');
    $json = json_encode($xmlFile);
    $array = json_decode($json, true);
} else {
    exit('Error al abrir test.xml');
}

$sxe = new SimpleXMLElement('<Catalog></Catalog>');
$sxe = copiarXML($sxe, $array);
$sxe = añadirNuevoNodo($sxe, $refBook);
$sxe->asXML('catalog2.xml');
