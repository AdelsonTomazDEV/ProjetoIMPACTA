
<?php
//conexao com banco de dados
$conexao = new mysqli('localhost', 'root', '', 'registro');

//verifica se a conexao falhou
if ($conexao->connect_error) {
    die('Erro ao conectar com o banco de dados: ' . $conexao->connect_error);
}

//so executa se o botao registrar ponto for clicado
if (isset($_POST['registrar_ponto'])) {

    //dados enviados do formulario
    $data = $_POST["data"];
    $entrada = $_POST["entrada"];
    $intervalo = $_POST["intervalo"];
    $saida = $_POST["saida"];

    //verifica se algum campo esta vazio
    if (empty($entrada) || empty($intervalo) || empty($saida)) {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
    } else {
        //insere os dados na tabela registros_horas
        $sql = "INSERT INTO registros_horas (data, entrada, intervalo, saida) VALUES ('$data', '$entrada', '$intervalo', '$saida')";

        if ($conexao->query($sql) === TRUE) {
            echo "<script>alert('Ponto registrado com sucesso!');</script>";
        } else {
            echo "Erro ao registrar ponto: " . $conexao->error;
        }
    }
}
?>

