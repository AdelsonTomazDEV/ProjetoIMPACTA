<?php
//verifica campo vazio e insere no banco de dados
if (empty($_POST['registrar'])) {
    if (empty($_POST["nome"]) or empty($_POST["email"]) or empty($_POST['usuario']) or empty($_POST["senha"]))
        echo '<div>Um dos campos está vazio</div>';
} else {
    $name = $_POST["nome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $sql = $conexao->query("insert into usuarios (nome,email,usuario,senha) values ('$name','$email','$usuario','$senha')");
    if ($sql == 1) {
        echo '<div>Usuario registrado</div>';
    } else {
        echo '<div>Erro ao registrar usuario</div>';
    }
}
