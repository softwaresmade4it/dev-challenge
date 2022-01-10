<?php

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\ClienteDao;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: clientes.php?status=error');
    exit;
}

$ClienteDao = new ClienteDao();
$clienteSelecionado = $ClienteDao->readCliente($_GET['id']);


if (isset($_POST['excluir'])){

    $ClienteDao = new ClienteDao();
    $ClienteDao->delete([$_GET['id']]);

    header('location: clientes.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';