<?php
namespace MyClasses;

class Bookstore {
    private $customers;
    private $books;

    public function __construct()
    {
        $this->customers = [];
        $this->books = [];
    }

    public function setCustomer($customer)
    {
        array_push($this->customers, $customer);
    }

    public function setBook($book)
    {
        array_push($this->books, $book);
    }

    public function getCustomers()
    {
        $customers = "";
        foreach ($this->customers as $customer) {
            $customers .= $customer;
        }
        return $customers;
    }

    public function getBooks()
    {
        $books = "";
        foreach ($this->books as $book) {
            $books .= $book;
        }
        return $books;
    }

    public function __toString()
    {
        $customers = "<div><h4>Clientes: </h4>" . $this->getCustomers() . "</div>";
        $books = "<div><h4>Libros: </h4>" . $this->getBooks() . "</div>";
        return "<div><h2>LIBRERIA</h2>$customers$books</div>";
    }
}