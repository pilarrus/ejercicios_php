<?php

// Vamos a mostrar un PDF, indica que abra una "aplicación" para que pueda visualizar el pdf
header('Content-type: application/pdf');

// Se llamará downloaded.pdf, indica que lo muestre en el navegador cuando pones inline
header('Content-Disposition: inline; filename="pili.pdf"');

// La fuente de PDF se encuentra en original.pdf, indica que lea el pdf
readfile('pdfs/original.pdf');

/*Si quisiesemos descargarlo en vez de visualizarlo
header('Content-Disposition: attachment; filename="downloaded.pdf"');*/

?>