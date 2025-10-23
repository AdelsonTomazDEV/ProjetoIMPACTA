<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PontoFLEX - Inicio </title>
    <style>
        /* ajustes: aumentar fonte base e centralizar a área na tela */
        :root {
            --bg: #f4f7fb;
            --card: #ffffff;
            --accent: #0b76c2;
            --muted: #6b7a86;
            --radius: 12px;
            --shadow: 0 10px 30px rgba(33, 53, 71, 0.09);
        }

        /* base maior e layout centralizado verticalmente */
        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif;
            background: var(--bg);
            color: #173245;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-size: 18px;
            /* aumenta todo o texto */
        }

        /* wrapper maior e mais espaçoso */
        .dashboard_container {
            width: calc(100% - 48px);
            max-width: 1100px;
            /* aumenta a área */
            margin: 0 auto;
            background: var(--card);
            padding: 50px 50px;
            /* mais área interna */
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        /* header maior */
        h1 {
            position: absolute;
            top: 16px;
            left: 16px;
            margin: 0;
            text-align: left;
            font-size: 24px;
            color: var(--accent);
        }

        /* tabela e form com fontes e espaçamentos maiores */
        form table {
            width: 100%;
            border-collapse: collapse;
            margin: 14px 0;
            font-size: 16px;
            /* aumentar texto da tabela */
        }

        form th,
        form td {
            padding: 14px 12px;
            /* mais espaço nas células */
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

        /* inputs maiores */
        input[type="time"],
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            /* padding maior */
            border: 1px solid #d6e1ea;
            border-radius: 8px;
            background: #fff;
            font-size: 16px;
            /* aumenta o texto dos inputs */
            color: #123;
            transition: box-shadow .15s, border-color .15s;
        }

        input[type="time"] {
            font-size: 16px;
            /* números maiores no time */
        }

        /* botão maior */
        input[type="submit"] {
            display: inline-block;
            background: var(--accent);
            color: #fff;
            border: 0;
            padding: 12px 22px;
            /* aumenta o botão */
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 8px 20px rgba(11, 118, 194, 0.12);
            transition: transform .08s ease, box-shadow .08s ease;
        }

        /* responsivo: manter espaçamento e scroll horizontal quando necessário */
        @media (max-width:900px) {
            .dashboard_container {
                padding: 20px;
                width: calc(100% - 32px);
            }

            form table {
                display: block;
                overflow: auto;
                white-space: nowrap;
            }

            form th,
            form td {
                min-width: 180px;
            }
        }

        /* ...existing code... */
    </style>
</head>

<body>

    <h1>PontoFLEX</h1>

    <div class="dashboard_container">



        <?php
        $hoje = date('Y-m-d'); // data atual
        ?>
        <form action="conexao_register_horas.php" method="post">
            <table border="1" style="border-collapse: collapse; width: 70%;">
                <tr>
                    <th>Data</th>
                    <th>Entrada</th>
                    <th>Intervalo</th>
                    <th>Saída</th>
                </tr>
                <tr>
                    <td><?= $hoje ?>
                        <input type=hidden name="data" value="<?= $hoje ?>">
                    </td>
                    <td><input type="time" name="entrada" required></td>
                    <td><input type="time" name="intervalo" required></td>
                    <td><input type="time" name="saida" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="registrar_ponto" value="Registrar Ponto">

            <div>

                <?php
                include 'conexao.php';

                // Quando o formulário for enviado
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

                $hoje = date('Y-m-d');
                ?>


                <form action="" method="post">

                    <h2>Histórico de Registros</h2>

                    <table border="1" style="border-collapse: collapse; width: 100%;">
                        <tr>
                            <th>Data</th>
                            <th>Entrada</th>
                            <th>Intervalo</th>
                            <th>Saída</th>
                        </tr>

                        <?php
                        // Conexão com o banco (ajuste conforme o seu arquivo de conexão)
                        include 'conexao.php';

                        // Consulta SQL - ordena do mais recente para o mais antigo
                        $sql = "SELECT * FROM registros_horas ORDER BY id DESC";
                        $result = $conexao->query($sql);

                        // Verifica se há resultados
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['data']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['entrada']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['intervalo']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['saida']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
                        }
                        ?>
                    </table>


                </form>
            </div>






        </form><br><br>
    </div>


</body>

</html>