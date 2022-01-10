<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Cliente;
use \App\Infrastructure\Repository\ClienteDao;

define('TITLE','Cadastro de Cliente');

if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['nome']) || empty($_POST['email']) ||empty($_POST['empresa'])) {
        header('location: clientes.php?status=error');
        exit;
    }

    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: clientes.php?status=error');
        exit;
    }

    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setEmpresa($_POST['empresa']);

    $ClienteDao = new ClienteDao();
    $ClienteDao->create($cliente);

    header('location: clientes.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';