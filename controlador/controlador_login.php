<?php
if (!empty($_POST["entrar"])) {
    if (empty($_POST["usuario"]) || empty($_POST["senha"])) {
        echo "Preencha os campos usuario e senha!";
    } else {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $sql = $conexao->query(" select * from usuarios where usuario='$usuario' and senha='$senha' ");
        if ($dados = $sql->fetch_object()) {
            header("location: inicio.php");
        } else {
            echo "Usuario ou senha invalidos";
        }
    }
}
