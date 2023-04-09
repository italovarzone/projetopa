<?php

include '../orders/backend/conexao.php';

// Definir as variáveis utilizadas na query
$connect = new mysqli("localhost", "root", "", "bdmemoria");

if ($connect -> connect_errno) {
    echo "Failed to connect to MySQL: " . $connect -> connect_error;
    exit();
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID and new name from the request
    $id_usuario = $_POST['id'];
    $time_record = $_POST['time_record'];
    
    try {
        // Prepare the SQL statement to update the user's name
        $stmt = $dbh->prepare("UPDATE users SET name = :new_name WHERE id = :user_id");
        $stmt->bindParam(':new_name', $new_name);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        
        // Return a success message
        echo "User's name updated successfully";
    } catch(PDOException $e) {
        // Return an error message if there's an error updating the user's name
        echo "Error updating user's name: " . $e->getMessage();
    }
}

var_dump($_POST);

// Executar a query SQL
$sql = "UPDATE usuarios SET time_record = `$time_record` WHERE id = `$id_usuario`";

if (mysqli_query($connect, $sql)) {
  echo "Record atualizado com sucesso!";
} else {
  echo "Erro ao atualizar record: " . mysqli_error($connect);
}

mysqli_close($connect);
?>