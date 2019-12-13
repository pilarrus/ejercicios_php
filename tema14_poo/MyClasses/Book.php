<?php
namespace MyClasses;

class Book {
    private $tittle;
    private $author;

    public function __construct($tittle, $author)
    {
        $this->tittle=$tittle;
        $this->author=$author;
    }

    public function __toString()
    {
        return "<p>$this->tittle - $this->author</p>";
    }
}