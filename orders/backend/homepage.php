<?php

require 'functions.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    $mensagem = "Você não está logado.";
    header("Location: login.php?mensagem=" . urlencode($mensagem));
    exit;
} else {
    bodyhomepage("Página Inicial");
    logout_page();
}
?>