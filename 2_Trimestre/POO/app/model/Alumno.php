<?php

require_once "persona.php";

class Alumno extends persona
{

    private $_nie;
    public function saluda()
    {
        echo parent::saluda();
        echo "Soy un alumno";
    }
}
