<?php
$data_source = "localhost";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO($data_source, $dbuser, $dbpass);

} catch (PDOException $e) {
    echo "Falha na conexão do banco!";
}
?>