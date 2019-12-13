<?php
    spl_autoload_register(function ($clase) {
        //include __DIR__ . '/clases/' . $clase . '.php'; //Sin usar namespace
        include_once str_replace("\\", "/", $clase) . ".php";
    });

    use MyClasses\{MiCabecera, Customer, Book, Bookstore};

    $cabecera = new MiCabecera("./logo_php.png", "Ejercicios POO");

    $customers = [
        new Customer("Pablo", "Rodríguez Armida", "paroar@gmail.com"),
        new Customer("Eli", "García Bueno", "eli@gmail.com"),
        new Customer("Ana", "Sersic Sánchez", "ana@gmail.com")
    ];

    $books = [
        new Book("El Quijote", "Cervantes"),
        new Book("Harry Potter", "J.K. Rowling"),
        new Book("Luces de Bohemia", "Valle-Inclán")
    ];

    $libreria = new Bookstore();

    foreach ($customers as $customer) {
        $libreria->setCustomer($customer);
    }

    foreach ($books as $book) {
        $libreria->setBook($book);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header con clase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php echo $cabecera; ?>
    <button class="volver_a_ejercicios">
        <a href="../index.php">Volver a Ejercicios</a>
    </button>
<?php echo $libreria;?>
</body>
</html>