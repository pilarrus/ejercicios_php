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
} else {
    exit('Error al abrir test.xml');
}

/* Paso el xml a string para obtener el nodo principal
** que contiene todos los libros*/
$xmlStr = $xmlFile->asXML();
$dom = new DOMDocument();
$dom->loadXML($xmlStr);

if (!$dom) {
    echo 'Error al parsear el documento';
    exit;
}

$sxe = simplexml_import_dom($dom);
var_dump($sxe);

// Le añado un nuevo nodo (libro)
$sxe = añadirNuevoNodo($sxe, $refBook);

// Lo guardo en un fichero
$sxe->asXML('catalog2.xml');
