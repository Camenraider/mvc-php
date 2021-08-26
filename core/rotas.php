<?php

// rotas da aplicação
$rotas = [
    'inicio' => 'main@index',
    'loja' => 'main@loja',
    'carrinho' => 'loja@carrinho'
];

// define ação valor padrão
$acao = 'inicio';

// verifica se existe a ação query string
if(isset($_GET['a'])){

    // verifica se a ação existe nas rotas
    if(!key_exists($_GET['a'], $rotas)){
        $acao = 'inicio';
    } else {
        $acao = $_GET['a'];
    }
}

// trata a definição da rota
$partes = explode('@',$rotas[$acao]);
$controlador = ucfirst($partes[0]);
$controlador = 'core\\controller\\'.$controlador;
$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();

 echo "$controlador - $metodo";



?>