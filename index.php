<?php
require_once 'orders/backend/functions.php';
require 'function_game.php';

session_start();

if (!isset($_SESSION['usuario_id'])) {
    $mensagem = "Você não está logado.";
    header("Location: ../../orders/backend/login.php?mensagem=" . urlencode($mensagem));
    exit;
} else {
    homeGame('Recycle Memory');
}

?>