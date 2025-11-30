<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PontoFLEX - Inicio </title>

    <style>
        :root {
            --bg: #f4f7fb;
            --card: #ffffff;
            --accent: #0b76c2;
            --muted: #6b7a86;
            --radius: 12px;
            --shadow: 0 10px 30px rgba(33, 53, 71, 0.09);
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif;
            background: var(--bg);
            color: #173245;
            padding: 0;
            min-height: 100vh;
        }

        /* ==============================
           CABEÇALHO RESPONSIVO
        ===============================*/
        header {
            width: 100%;
            background: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .menu {
            display: flex;
            gap: 20px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        #menu-toggle {
            display: none;
        }

        .menu-icon {
            display: none;
            font-size: 2rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .menu {
                width: 100%;
                flex-direction: column;
                display: none;
                text-align: center;
                padding: 10px 0;
            }

            #menu-toggle:checked+.menu-icon+.menu {
                display: flex;
            }

            .menu-icon {
                display: block;
            }
        }

        /* ==============================
           CONTEÚDO DO SISTEMA
        ===============================*/
        .dashboard_container {
            width: calc(100% - 48px);
            max-width: 1100px;
            margin: 40px auto;
            background: var(--card);
            padding: 50px 50px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        h2,
        h3 {
            color: var(--accent);
        }

        form table {
            width: 100%;
            border-collapse: collapse;
            margin: 14px 0;
            font-size: 16px;
        }

        form th,
        form td {
            padding: 14px 12px;
            text-align: left;
            vertical-align: middle;
        }

        form th {
            background: linear-gradient(90deg, var(--accent), #2da0e8);
            color: #fff;
            font-weight: 600;
            font-size: 15px;
        }

        form td {
            background: transparent;
            border-bottom: 1px solid #eef3f7;
        }

        input[type="time"],
        input[type="date"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d6e1ea;
            border-radius: 8px;
            background: #fff;
            font-size: 16px;
            color: #123;
        }

        input[type="submit"],
        button {
            background: var(--accent);
            color: #fff;
            border: 0;
            padding: 10px 18px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            font-size: 15px;
        }

        table {
            background: white;
        }

        table th {
            background: var(--accent);
            color: white;
        }
    </style>

</head>

<body>

    <header>
        <div class="logo">PontoFLEX</div>

        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">☰</label>

        <nav class="menu">

        </nav>
    </header>

    <div class="dashboard_container">

        <?php
        include 'conexao.php';

        if (isset($_POST['registrar_ponto'])) {
            $data = $_POST['data'];
            $entrada = $_POST['entrada'];
            $intervalo = $_POST['intervalo'];
            $saida = $_POST['saida'];

            $sql = "INSERT INTO registros_horas (data, entrada, intervalo, saida)
                    VALUES ('$data', '$entrada', '$intervalo', '$saida')";

            if ($conexao->query($sql) === TRUE) {
                echo "<p style='color: green; font-weight: bold;'>Ponto registrado com sucesso!</p>";
            } else {
                echo "<p style='color: red;'>Erro ao registrar: " . $conexao->error . "</p>";
            }
        }

        if (isset($_POST['salvar_edicao'])) {
            $id = $_POST['id'];
            $data = $_POST['data'];
            $entrada = $_POST['entrada'];
            $intervalo = $_POST['intervalo'];
            $saida = $_POST['saida'];

            $sql_update = "UPDATE registros_horas
                           SET data='$data', entrada='$entrada', intervalo='$intervalo', saida='$saida'
                           WHERE id='$id'";

            if ($conexao->query($sql_update) === TRUE) {
                echo "<p style='color: green; font-weight: bold;'>Registro atualizado com sucesso!</p>";
            } else {
                echo "<p style='color: red;'>Erro ao atualizar: " . $conexao->error . "</p>";
            }
        }

        $hoje = date('Y-m-d');
        ?>

        <h2>Registrar Ponto</h2>

        <form action="" method="post">
            <table>
                <tr>
                    <th>Data</th>
                    <th>Entrada</th>
                    <th>Intervalo</th>
                    <th>Saída</th>
                </tr>
                <tr>
                    <td><?= $hoje ?><input type="hidden" name="data" value="<?= $hoje ?>"></td>
                    <td><input type="time" name="entrada" required></td>
                    <td><input type="time" name="intervalo" required></td>
                    <td><input type="time" name="saida" required></td>
                </tr>
            </table>
            <input type="submit" name="registrar_ponto" value="Registrar Ponto">
        </form>

        <br><br>

        <h2>Histórico de Registros</h2>

        <table border="1" style="border-collapse: collapse; width:100%;">
            <tr>
                <th>Data</th>
                <th>Entrada</th>
                <th>Intervalo</th>
                <th>Saída</th>
                <th>Ações</th>
            </tr>

            <?php
            $sql = "SELECT * FROM registros_horas ORDER BY id DESC";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['data'] . "</td>";
                    echo "<td>" . $row['entrada'] . "</td>";
                    echo "<td>" . $row['intervalo'] . "</td>";
                    echo "<td>" . $row['saida'] . "</td>";
                    echo "<td>
                            <form method='post'>
                                <input type='hidden' name='editar_id' value='" . $row['id'] . "'>
                                <input type='submit' value='Editar'>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum registro encontrado.</td></tr>";
            }
            ?>
        </table>

        <br>

        <?php
        if (isset($_POST['editar_id'])) {
            $id = $_POST['editar_id'];

            $sql_edit = "SELECT * FROM registros_horas WHERE id='$id'";
            $res_edit = $conexao->query($sql_edit);
            $dados = $res_edit->fetch_assoc();

            echo "
            <h3>Editar Registro</h3>

            <form method='post'>
                <input type='hidden' name='id' value='{$dados['id']}'>

                Data: <input type='date' name='data' value='{$dados['data']}' required><br><br>
                Entrada: <input type='time' name='entrada' value='{$dados['entrada']}' required><br><br>
                Intervalo: <input type='time' name='intervalo' value='{$dados['intervalo']}' required><br><br>
                Saída: <input type='time' name='saida' value='{$dados['saida']}' required><br><br>

                <input type='submit' name='salvar_edicao' value='Salvar Alterações'>
            </form>
            ";
        }
        ?>

    </div>

</body>

</html>