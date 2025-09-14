  <?php 
        include 'conexao_bd.php';
        include 'controlador/controlador_login.php';

        
        ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PontoFLEX</title>
    <link rel ="stylesheet" href="css/style.css">

</head>
<body>
     
    <form id="login_css" action="" method="post">
 
        <img src="img/logo.png" alt="logo PontoFLEX">
        <br><br>

      

             <!-- Login -->
       <label for="campo_usuario">Usuario:</label><br>
       <input type="text" id= "campo_usuario" name="usuario" placeholder= "Usuario" required>
       <br><br>

             <!-- Senha -->
       <label for="campo_senha" id="senha_usuario">Senha:</label><br>
       <input type="password" id="campo_senha" name="senha"placeholder="Senha" required>
       <br><br>
                  
           <!-- checkbox para manter logado -->
       <input type="checkbox" id="manter_logado" name="manter_logado">
       <label for="manter_logado">Manter logado</label>
       <br><br>

             <!-- Botao para enviar -->
       <input type="submit" value="Entrar" name="entrar">  
       <br><br>

                 <!-- Link para recuperacao de senha de usuario-->
        <a class="linha" href="recoverpassword.php">Esqueceu a senha?</a>
        <br><br>
                 <!-- Link para criar nova conta -->
        <a class="linha" href="register.php">Criar Conta</a>
       <br><br>


    </form>
     
</body>
</html>