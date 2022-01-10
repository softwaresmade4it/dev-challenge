

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./includes/style-clientes.css">

    <!-- DataTables -->
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>


    <?php
      session_start();
      include('../autenticacao/verifica_login.php');
    ?>

    <title>CLIENTES</title>
  
  </head>
  <body class="text-dark">

    <div class="container"> <!-- objetos centralizado -->
      <div class="jumbotron light">
        <h1>PÁGINA DE CLIENTES</h1>
        <p>Esta é a página de clientes do challenge.</p>
      </div>
