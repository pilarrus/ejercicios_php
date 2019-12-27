<?php
namespace MyClasses;

class Customer extends Person {
    private static $lastID = 0;
    private $id;
    private $email;

    public function __construct($name, $surnames, $email)
    {
        parent::__construct($name, $surnames);
        $this->id = ++self::$lastID;
        $this->email = $email;
    }

    public function __toString()
    {
        // Si las propiedades en el padre fueran private:
        //return "<p>$this->id - " . parent::getName() . " " . parent::getSurnames() . " - $this->email</p>";
        return "<p>$this->id - $this->name $this->surnames - $this->email</p>";
    }
}