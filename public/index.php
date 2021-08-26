<?php

use core\classes\Database;
use core\classes\Functions;

    // iniciar sessão
    session_start();

    //carregar o config
    require_once('../config.php');

    // carrega todas as classes do projeto
    require_once('../vendor/autoload.php');

    // carrega o sistema de rotas
    require_once('../core/rotas.php');


?>




