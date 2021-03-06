<?php

require_once 'vendor\autoload.php';

use App\Models\Persona;
use App\Models\Perro;
/* 
require_once "app/models/Persona.php";
require_once "app/models/Perro.php"; */

$persona = new Persona();
$perro = new Perro();

$persona->persona();
echo "<br>";
$perro->perro();
