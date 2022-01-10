<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Tarefa;
use \App\Infrastructure\Repository\TarefaDao;


define('TITLE','Edição de Tarefas');

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: tarefas.php?status=error');
    exit;
}

$TarefaDao = new TarefaDao();
$tarefaSelecionada = $TarefaDao->readTarefa($_GET['id']);

if(empty($tarefaSelecionada)){
    header('location: tarefas.php?status=error');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    if (empty($_POST['tarefa']) || empty($_POST['prazo']) || empty($_POST['status'])) {
        header('location: tarefas.php?status=error');
        exit;
    }

    $tarefa = new Tarefa();
    $tarefa->setId($_GET['id']);
    $tarefa->setTarefa($_POST['tarefa']);
    $tarefa->setPrazo($_POST['prazo']);
    $tarefa->setStatus($_POST['status']);

    $TarefaDao = new TarefaDao();
    $TarefaDao->update($tarefa);

    header('location: tarefas.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';