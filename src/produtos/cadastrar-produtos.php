<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Produto;
use \App\Infrastructure\Repository\ProdutoDao;

define('TITLE','Cadastro de Produto');

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['codigo']) || empty($_POST['nome']) || empty($_POST['preco']) || empty($_POST['descricao'])) {
        header('location: produtos.php?status=error');
        exit;
    }

    $produto = new Produto();
    $produto->setCodigo($_POST['codigo']);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setDescricao($_POST['descricao']);

    $ProdutoDao = new ProdutoDao();
    $ProdutoDao->create($produto);

    header('location: produtos.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';