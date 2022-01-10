<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', 'mariadb@password!');
define('DB', 'challenge');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');