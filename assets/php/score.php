<?php
// conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdmemoria";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// verifica a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// busca os dados do ranking no banco de dados
$sql = "SELECT nome, email, time_record FROM usuarios ORDER BY time_record ASC LIMIT 10";
$result = mysqli_query($conn, $sql);

// exibe os dados na tabela
if (mysqli_num_rows($result) > 0) {
    $posicao = 1;
    $tableRows = ""; // variável para armazenar as linhas da tabela
    
    while ($row = mysqli_fetch_assoc($result)) {
        $tableRows .= "<tr><td>{$posicao}º</td><td>{$row['nome']}</td><td>{$row['time_record']}</td></tr>";
        $posicao++;
    }
}

echo "<!DOCTYPE html>
<html lang=\"pt-br\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"../css/styletablescore.css\">
    <title>Ranking</title>
</head>
<body>
<h1>Ranking de Jogadores</h1>
    <table>
        <thead>
            <tr>
                <th>Posição</th>
                <th>Nome do Jogador</th>
                <th>Score</th>
            </tr>
        </thead>
    <tbody>
        $tableRows
    </tbody>
    </table>
</body>
</html>";

// fecha a conexão
mysqli_close($conn);
?>