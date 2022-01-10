<?php

$mensagem = '';
if(isset($_GET['status'])){
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
      break;
  }
}

?>



<main>
  <?=$mensagem?>
  <section class="mb-4">
    <a href="../../index.php"><button class="btn btn-success">Home</button></a>
    <a href="cadastrar-produtos.php"><button class="btn btn-success">Novo produto</button></a>
  </section>

  <section>
    <form action="produtos.php" method="post">
      <table id="tabela" class="table bg-light mt-4 rounded-lg">
        <thead>
          <tr>
            <th data-sortable="false">
              <div>
                <input class="check" type="checkbox" value="" id="checkIndex">
                <label class="check"></label>
              </div>
            </th>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th data-sortable="false">Ações</th>
          </tr> 
        </thead>
        <tbody>
          <?php foreach($produtos as $produto): ?>
          <tr>
            <td>
                <input class="check" type="checkbox" id="check" name="excluir[<?=$produto['id']?>]">
                <label class="check"></label>
            </td>
            <td><?=$produto['codigo']?></td>
            <td><?=$produto['nome']?></td>
            <td><?=$produto['preco']?></td>
            <td><?=$produto['descricao']?></td>
            <td> 
              <a href="editar-produtos.php?id=<?=$produto['id']?>"><button type="button" class="btn btn-primary btn-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                  </svg>
                </button></a>
              <a href="excluir-produtos.php?id=<?=$produto['id']?>"><button type="button" class="btn btn-danger btn-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                  </svg>
                </button></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <input type="submit" name="excluirProduto" value="Excluir" class="btn btn-danger" />
    </form>
  </section>

  <!-- Realiza a seleção de todos os checkbox -->
  <script>

    let checkIndex = document.querySelector('#checkIndex')
    
    checkIndex.addEventListener('click', () => {
      
      if (checkIndex.checked){
        for(let current of document.querySelectorAll('#check')) {
          current.checked = true
        }
      } else {
        for(let current of document.querySelectorAll('#check')) {
          current.checked = false
        }
      }
    })

  </script>


  <!-- Realiza a ordenação e paginação da tabela-->
  <script>
    //https://github.com/Mobius1/Vanilla-DataTables

    var table = document.querySelector("#tabela");
    var dataTable = new DataTable(table,{
      perPage:5,   

      labels: {
      placeholder: "Busca de produtos...",
      perPage: "{select}",
      noRows: "Nenhum produto encontrado",
      info: "{rows} resultados\n. Apresentando produtos de {start} à {end} (Página {page} de {pages})",
      }
        
    });

  </script>

  
</main>