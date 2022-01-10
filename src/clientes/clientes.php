<?php

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\ClienteDao;

$ClienteDao = new ClienteDao();
$clientes = $ClienteDao->read();

$clientesID = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($clientesID['excluirCliente'])) {
    if(isset($clientesID['excluir'])) {
        $i=0;
        foreach($clientesID['excluir'] as $id => $cliente) {
            $ids[$i] = $id;
            $i++;
        }

        $ClienteDao = new ClienteDao();
        $ClienteDao->delete($ids);
    
        header('location: clientes.php?status=success');
        exit;

    } else {
        header('location: clientes.php?status=error');
    }
}




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

