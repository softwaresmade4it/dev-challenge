<main>

  <section>
    <a href="tarefas.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="text-light mt-3"><?=TITLE?></h2>
  
  <form method="post" class="text-light">
    <div class="form-group">
      <label>Tarefa</label>
      <input type="text" class="form-control" name="tarefa" value="<?php echo isset($tarefaSelecionada[0]['tarefa']) ? $tarefaSelecionada[0]['tarefa'] : null; ?>">
    </div>

    <div class="form-group">
      <label>Prazo</label>
      <input type="text" class="form-control" name="prazo" value="<?php echo isset($tarefaSelecionada[0]['prazo']) ? $tarefaSelecionada[0]['prazo'] : null; ?>">
    </div>


    <div class="mt-5 form-group container d-flex justify-content-center align-items-center">
      <select name="status" id="status">
        <option value="">Selecione</option>
        <option value="fazer">A Fazer</option>
        <option value="fazendo">Fazendo</option>
        <option value="cancelado">Cancelado</option>
        <option value="finalizado">Finalizado</option>
      </select>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </fomr> 

</main>