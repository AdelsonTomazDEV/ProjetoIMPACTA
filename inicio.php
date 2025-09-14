<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PontoFLEX - Inicio </title>
</head>

<body>

    <h1>PontoFLEX</h1>

    <div class="dashboard_container">



        <?php
        $hoje = date('Y-m-d'); // data atual
        ?>
        <form action="" method="post">
            <table border="1" style="border-collapse: collapse; width: 50%;">
                <tr>
                    <th>Data</th>
                    <th>Entrada</th>
                    <th>Intervalo</th>
                    <th>Saída</th>
                </tr>
                <tr>
                    <td><?= $hoje ?></td>
                    <td><input type="time" name="entrada" required></td>
                    <td><input type="time" name="intervalo" required></td>
                    <td><input type="time" name="saida" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Registrar Ponto">



            <!-- <div class= data>
<label for="data">Data</label>
<input type="time" id= "data" name= "data" required> 
</div>
<br><br>

<div class= entrada>
    <label for="entrada">Entrada</label>
<input type="time" id="entrada" name="entrada" required></div>
<br><br>

<div class= intervalo>
    <label for="intervalo">Intervalo</label>
<input type="time" id= "intervalo" name="intervalo" required></div>
<br><br>

<div class= saida>
<label for="saida">Saida</label>
<input type="time" id="saida" name="saida" required></div> -->


        </form>
    </div>

</body>

</html>