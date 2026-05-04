<?php
require_once 'conexao.php';
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha varchar(100) not null,
    constraint usuarios_email_uk unique (email)
)";
$sql1 = "CREATE TABLE IF NOT EXISTS carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    montadora VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    placa VARCHAR(100) NOT NULL,
    constraint carros_placa_uk unique (placa)
)";

$pdo->exec($sql);
$pdo->exec($sql1);
echo "<h1>Tabela criada com sucesso!</h1>";
header("Location: show_user.php?msg=tabela_pronta");