<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Usuario;
use \App\Infrastructure\Repository\UsuarioDao;






if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    if (empty($_POST['usuario']) || empty($_POST['senha'])) {
        header('location: cadastrar-usuario.php?status=error');
        exit;
    }

    if ($_POST['senha'] != $_POST['senhaConfirmada']) {
        header('location: cadastrar-usuario.php?status=error');
        exit;
    }

    $usuario = new Usuario();
    $usuario->setNome($_POST['usuario']);
    $usuario->setSenha($_POST['senha']);

    $UsuarioDao = new UsuarioDao();
    $UsuarioDao->create($usuario);

    header('location: ../../index.php?status=success');
    exit;

}

include __DIR__.'/telaCadastrar.php';