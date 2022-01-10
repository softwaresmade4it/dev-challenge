<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Cliente;
use \App\Infrastructure\Repository\ClienteDao;


define('TITLE','Edição de Cliente');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: clientes.php?status=error');
    exit;
}

$ClienteDao = new ClienteDao();
$clienteSelecionado = $ClienteDao->readCliente($_GET['id']);

if(empty($clienteSelecionado)){
    header('location: clientes.php?status=error');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['empresa'])) {
        header('location: clientes.php?status=error');
        exit;
    }


    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: clientes.php?status=error');
        exit;
    }


    $cliente = new Cliente();
    $cliente->setId($_GET['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setEmpresa($_POST['empresa']);

    $ClienteDao = new ClienteDao();
    $ClienteDao->update($cliente);

    header('location: clientes.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';