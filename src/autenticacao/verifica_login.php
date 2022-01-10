<?php
session_start();
if(!$_SESSION['usuario']) {
	header('Location: ../autenticacao/telaLogin.php');
	exit();
}