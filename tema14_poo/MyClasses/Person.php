<?php
namespace MyClasses;

class Person {
    protected $name;
    protected $surnames;

    public function __construct($name, $surnames)
    {
        $this->name = $name;
        $this->surnames = $surnames;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurnames()
    {
        return $this->surnames;
    }

    public function __toString()
    {
        return "<p>$this->name $this->surnames</p>";
    }
}