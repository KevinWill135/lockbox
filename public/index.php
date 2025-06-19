<?php

//require "../models/Usuario.php";
require "../Core/functions.php";

spl_autoload_register(function ($class) {
        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

        require base_path("{$class}.php");
});



session_start();



//require '../Validacao.php';

//require '../Flash.php';

//require "../Database.php";

require base_path('/config/routes.php');
