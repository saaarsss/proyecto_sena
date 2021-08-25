<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaControlle extends Controller
{
    function mostrarNombre($nombre){
        return "Nombre :" .ucfirst($nombre);
    }
}
