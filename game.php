<?php
require_once 'orders/backend/functions.php';
require 'function_game.php';

session_start();

$user = $_SESSION['usuario_id'];
$username = $_SESSION['usuario_nome'];

if (!isset($_SESSION['usuario_id'])) {
    $mensagem = "Você não está logado.";
    header("Location: ../../orders/backend/login.php?mensagem=" . urlencode($mensagem));
    exit;
} else {
    $nome;
    homeGame('Recycle Memory', $username);
}

?>