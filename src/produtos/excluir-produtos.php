<?php

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\ProdutoDao;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: produtos.php?status=error');
    exit;
}

$produtoDao = new ProdutoDao();
$produtoSelecionado = $produtoDao->readCliente($_GET['id']);


if (isset($_POST['excluir'])){

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->delete([$_GET['id']]);

    header('location: produtos.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';