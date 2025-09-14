<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PontoFlex</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <form id="recoverpassword_css">

        <img src="img/logo.png" alt="Logo PontoFlex"><br><br>

        <h1>Recuperar senha</h1>
        <br><br>

        <!-- inserir email de recuperacao -->
        <labem for="campo_email">Email</labem><br>
        <input type="email" id="campo_email" placeholder="Email" required>
        <br><br>

        <!-- inserir email de recuperacao -->
        <label for="confirmar_email">Confirmar Email</label><br>
        <input type="email" id="confirmar_email" placeholder="Confirmar Email" required>
        <br><br>

        <!-- Botao para enviar -->
        <input type="submit" value="Enviar">
        <br><br>

        <!-- Link para login -->
        <a class="linha" href="login.php">Fazer login</a>
        <br><br>
        <a class="linha" href="index.php">Voltar a tela inicial</a>


    </form>

</body>

</html>