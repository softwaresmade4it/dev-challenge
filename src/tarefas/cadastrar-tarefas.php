<?php

require_once '../../vendor/autoload.php';

use \App\Domain\Model\Tarefa;
use \App\Infrastructure\Repository\TarefaDao;

define('TITLE','Cadastro de uma nova Tarefa');

//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;


if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    
    if (empty($_POST['tarefa']) || empty($_POST['prazo']) || empty($_POST['status'])) {
        header('location: tarefas.php?status=error');
        exit;
    }


    $tarefa = new Tarefa();
    $tarefa->setTarefa($_POST['tarefa']);
    $tarefa->setPrazo($_POST['prazo']);
    $tarefa->setStatus($_POST['status']);

    $tarefaDao = new TarefaDao();
    $tarefaDao->create($tarefa);

    

    
    header('location: tarefas.php?status=success');
    exit;

}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';