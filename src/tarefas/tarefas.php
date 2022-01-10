<?php

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\TarefaDao;

$TarefaDao = new TarefaDao();
$tarefas = $TarefaDao->read();

$tarefasID = filter_input_array(INPUT_POST, FILTER_DEFAULT);



if (!empty($tarefasID['excluirTarefa'])) {
    if(isset($tarefasID['excluir'])) {
        $i=0;
        foreach($tarefasID['excluir'] as $id => $cliente) {
            $ids[$i] = $id;
            $i++;
        }

        $TarefaDao = new TarefaDao();
        $TarefaDao->delete($ids);
    
        header('location: tarefas.php?status=success');
        exit;

    } else {
        header('location: tarefas.php?status=error');
    }
}




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

