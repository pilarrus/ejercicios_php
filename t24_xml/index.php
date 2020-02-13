<?php

include 'catalog.php';

$refBook = [
    'Author' => 'J.K.Rowling',
    'Title' => 'Hola',
    'Genre' => 'Ficción',
    'Price' => '12.99',
    'PublishDate' => '1995-02-01',
    'Description' => 'Un joven mago...'
];

function crearNodo($xmlStr, $refBook) {
    $sxe = new SimpleXMLElement($xmlStr);
    $book = $sxe->addChild('Book');
    $book->addAttribute('id', 'bk102');

    foreach ($refBook as $key => $value) {
        $book->addChild($key, $value);
    }
    //echo $sxe->asXML(), '<br/>';
    //var_dump($sxe);
    return $sxe->asXML();
}

$sxe = crearNodo($xmlStr, $refBook);
//var_dump($sxe);

$xml = simplexml_load_string($sxe);
//$xml = simplexml_load_string($xmlStr);

$json = json_encode($xml);
$arrayCatalog = json_decode($json, true);

var_dump($arrayCatalog);
//echo $arrayCatalog['Book'][0]['@attributes']['id'] . '<br/>';
/*foreach ($arrayCatalog as $key => $arrayBooks) {
    //var_dump($key);
    //var_dump($arrayBooks);
    foreach ($arrayBooks as $key2 => $arrayBook) {
        //var_dump($key2);
        //var_dump($arrayBook);
        foreach ($arrayBook as $key3 => $value) {
            //var_dump($key3);
            //var_dump($value);
            if(is_array($value)) {
                //echo $value['id'], '<br/>';
                if((string) $value['id'] == 'bk101') {
                    echo "aquí";
                }
            }
        }
    }
}*/