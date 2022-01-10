<?php

require_once '../../vendor/autoload.php';

use \App\Infrastructure\Repository\ProdutoDao;

$produtoDao = new ProdutoDao();
$produtos = $produtoDao->read();

$produtosID = filter_input_array(INPUT_POST, FILTER_DEFAULT);



if (!empty($produtosID['excluirProduto'])) {
    if(isset($produtosID['excluir'])) {
        $i=0;
        foreach($produtosID['excluir'] as $id => $produto) {
            $ids[$i] = $id;
            $i++;
        }
        
        $ProdutoDao = new ProdutoDao();
        $ProdutoDao->delete($ids);
    
        header('location: produtos.php?status=success');
        exit;

    } else {
        header('location: produtos.php?status=error');
    }
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';

