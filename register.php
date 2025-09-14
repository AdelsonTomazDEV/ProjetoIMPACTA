 <?php

      include('conexao.php');
      include('controlador/controlador_registro.php');

      ?>

 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>PontoFLEX</title>
       <link rel="stylesheet" href="css/style.css">
 </head>

 <body>
       <form action="" method="POST" id="register_css">

             <img src="img/logo.png" alt="Logo PontoFlex"><br>

             <h2>REGISTRAR</h2>


             <!-- Nome Completo -->
             <label for="campo_nome">Nome Completo:</label><br>
             <input type="text" id="campo_nome" name="nome" placeholder="Nome Completo" required>
             <br><br>

             <!-- Email -->
             <label for="campo_email">Email:</label><br>
             <input type="email" id="campo_email" name="email" placeholder="Email" required>
             <br><br>

             <!-- Login -->
             <label for="campo_usuario">Nome de Usuario:</label><br>
             <input type="text" id="campo_usuario" name="usuario" placeholder="Usuario" required>
             <br><br>

             <!-- Senha -->
             <label for="campo_senha" id="senha_usuario">Senha:</label><br>
             <input type="password" id="campo_senha" name="senha" placeholder="Senhar" required>
             <br><br>

             <!-- Confirmar Senha  -->
             <!-- <label for="campo_confirmar_senha" id="confirmar_senha_usuario">Confirmar Senha:</label><br>
       <input type="password" id="campo_confirmar_senha" placeholder="Confirmar Senha" required>
       <br><br>  -->

             <!-- checkbox para aceitar termos e condicoes -->

             <input type="checkbox" id="aceitar_termos" name="aceitar_termos" required>
             <label for="checkbox">Concordo com os Termos e Condições</label>
             <br><br>

             <!-- Botao para enviar -->
             <input type="submit" value="Registrar" name="registrar">
             <br><br>

             <!-- Link para login -->
             <a class="linha" href="login.php">Tem conta? Entre aqui</a>
             <br><br>

 </body>

 </html>