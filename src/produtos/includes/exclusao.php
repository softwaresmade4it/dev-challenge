<main>

  <h2 class="mt-3 text-light">Exclusão do Produto</h2>
  
  <form method="post" class="text-light">
    
    <div class="form-group mt-5">
      <p>Você deseja excluir o produto <strong><?=$produtoSelecionado[0]['nome'];?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="produtos.php"><button type="button" class="btn btn-success">Cancelar</button></a>
      <button type="submit" name="excluir" class="btn btn-danger">Excluir</div>
 
  </fomr> 

</main>