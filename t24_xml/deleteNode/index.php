<?php

$file = 'catalog.xml';

if (file_exists($file)) {
    $xmlFile = simplexml_load_file($file);
} else {
    exit('Error al abrir ' . $file);
}

function getNode($xmlFile) {
    foreach ($xmlFile->children() as $value) {
        if ($value['id'] == 'bk103') {
            return $value;
        }
    }
}

$sxe = getNode($xmlFile);
$dom = dom_import_simplexml($sxe);
$dom->parentNode->removeChild($dom);

echo $xmlFile->asXML($file);