<main>

  <section>
    <a href="clientes.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="text-light mt-3"><?=TITLE?></h2>
  
  <form method="post" class="text-light">
    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo isset($clienteSelecionado[0]['nome']) ? $clienteSelecionado[0]['nome'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" name="email" value="<?php echo isset($clienteSelecionado[0]['email']) ? $clienteSelecionado[0]['email'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Empresa</label>
      <input type="text" class="form-control" name="empresa" value="<?php echo isset($clienteSelecionado[0]['empresa']) ? $clienteSelecionado[0]['empresa'] : null; ?>">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </fomr> 

</main>