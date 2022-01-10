<?php

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\TarefaDao;


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: tarefas.php?status=error');
    exit;
}

$TarefaDao = new TarefaDao();
$tarefaSelecionada = $TarefaDao->readTarefa($_GET['id']);


if (isset($_POST['excluir'])){

    $TarefaDao = new TarefaDao();
    $TarefaDao->delete([$_GET['id']]);

    header('location: tarefas.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/exclusao.php';
include __DIR__.'/includes/footer.php';