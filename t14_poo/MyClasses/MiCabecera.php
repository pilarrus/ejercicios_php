<?php
namespace MyClasses;

class MiCabecera {
    private $logo;
    private $tittle;

    public function __construct($logo, $tittle)
    {
        $this->logo = $logo;
        $this->tittle = $tittle;
    }

    public function getLogo()
    {
        return "<img src=\"$this->logo\" alt='logo'/>";
    }

    public function getTittle()
    {
        return "<h1>$this->tittle</h1>";
    }

    public function __toString()
    {
        return "<header>" . $this->getLogo() . $this->getTittle() . "</header>";
    }
}