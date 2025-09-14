<?php
$conexao = new mysqli('localhost', 'root', '', 'registro');
$conexao->set_charset('utf8');

if ($conexao->connect_error) {
    die('Erro ao conectar com o banco de dados: ' . $conexao->connect_error);
}
