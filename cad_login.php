<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>UniCar - Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['senha']]);
        header("Location: telalogin.php?msg=sucesso");
        exit;
    } catch (Exception $e) {
        header("Location: telalogin.php.php?msg=erro");
    }
}
?>
<h2>Cadastrar Usuário</h2>
<form method="POST">
    <input type="text" name="nome" id="nome"  placeholder="Nome" required><br><br>
    <input type="text" name="sobrenome" id="sobrenome" placeholder="sobrenome" required><br><br>
    <input type="email" name="email" id="email" placeholder="e-mail" required><br><br>
    <input type="password" name="senha" id="senha" placeholder="senha" required><br><br>
    <button type="submit" href="telalogin.php">Salvar</button>
    <a class="botao voltar" href="telalogin.php">Voltar</a>
</form>
<?php include_once 'footer.php'; ?>
    
</main>
</body>