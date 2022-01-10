<main>

  <section>
    <a href="produtos.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3 text-light"><?=TITLE?></h2>
  
  <form method="post" class="text-light">

    <div class="form-group">  
      <label>Código</label>
      <input type="text" class="form-control" name="codigo" value="<?php echo isset($produtoSelecionado[0]['codigo']) ? $produtoSelecionado[0]['codigo'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo isset($produtoSelecionado[0]['nome']) ? $produtoSelecionado[0]['nome'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Preço</label>
      <input type="text" class="form-control" name="preco" value="<?php echo isset($produtoSelecionado[0]['preco']) ? $produtoSelecionado[0]['preco'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Descrição</label>
      <textarea class="form-control" name="descricao" rows="4"><?php echo isset($produtoSelecionado[0]['descricao']) ? $produtoSelecionado[0]['descricao'] : null; ?></textarea>
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </fomr> 

</main>