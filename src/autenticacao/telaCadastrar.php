<?php
session_start();
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>CHALLENGE</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>
    

    <body>


        <div class="wrapper fadeInDown">
 
            <div id="formContent">

            <a href="./telaLogin.php"><h2 class="inactive underlineHover"> Sign In </h2></a>
            <a href="./cadastrar-usuario.php"><h2 class="active">Sign Up </h2></a>
        
            <form action="./cadastrar-usuario.php" method="POST">
                
                <input name="usuario" name="text" type="text" class="fadeIn second"  placeholder="Insira um nome de usuário">
                <input name="senha" type="password" class="fadeIn third" placeholder="Digite uma senha">
                <input name="senhaConfirmada" type="password" class="fadeIn third" placeholder="Repita a senha">
                <input type="submit" class="fadeIn fourth" value="Register">
                
            </form>
 
        
            </div>
        </div>
    </body>

</html>