<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__. '/../vendor/autoload.php'; 
//Conectar a a la db
$db=conectarDB();

use Model\ActiveRecord;
ActiveRecord::setDb($db);

    
