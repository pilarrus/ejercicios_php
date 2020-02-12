<?php

include 'catalog.php';

$refBook = [
    'Author' => 'J.K.Rowling',
    'Title' => 'Harry Potter y la Piedra Filosofal',
    'Genre' => 'Ficción',
    'Price' => '12.99',
    'PublishDate' => '1995-02-01',
    'Description' => 'Un joven mago...'
];

/*$sxe = new SimpleXMLElement($xmlStr);
$book = $sxe->addChild('book');
$book->addAttribute('id', 'bk102');

foreach ($refBook as $key => $value) {
    $book->addChild($key, $value);
}*/

//echo $sxe->asXML(), '<br/>';

function crearNodo($xmlStr, $refBook) {
    $sxe = new SimpleXMLElement($xmlStr);
    $book = $sxe->addChild('book');
    $book->addAttribute('id', 'bk102');

    foreach ($refBook as $key => $value) {
        $book->addChild($key, $value);
    }
    echo $sxe->asXML(), '<br/>';
}

$xml = simplexml_load_string($xmlStr);
echo $xml->Book[0]->Author, '<br/>';
echo $xml->Book['id'], '<br/>';

foreach ($xml as $book => $value) {
    echo $book . ' ' . $value . '<br/>';
    if ((string) $value['id'] === 'bk101') {
        echo 'Hola<br/>';
        crearNodo($xmlStr, $refBook);
    }
}
