<?php

include 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmaSenha = $_POST["confirma-senha"];

if ($senha !== $confirmaSenha) {
    $mensagem = "Senhas não estão iguais";
    header("Location: cadastro.php?mensagem=" . urlencode($mensagem));
    exit;
} else {
    // verificar se o usuário já existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome' OR email = '$email'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuarioJaExiste = True;
        // o usuário já existe no banco de dados
        if ($usuarioJaExiste) {
            $mensagem = "Usuario já cadastrado";
            header("Location: cadastro.php?mensagem=" . urlencode($mensagem));
            exit;
        }
        mysqli_close($conn);
    } else {
        // o usuário não existe no banco de dados
        $senha = sha1($senha); 
        $email = sha1($email);
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../../game.php");
            exit;
        } else {
            $mensagem = "erro, usuário não cadastrado.";
            header("Location: cadastro.html?mensagem=" . urlencode($mensagem));
        }


        mysqli_close($conn);
    }
}
?>