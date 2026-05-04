<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['senha']]);
        header("Location: show_user.php?msg=sucesso");
        exit;
    } catch (Exception $e) {
        header("Location: show_user.php?msg=erro");
        exit;
    }
}
include_once 'header.php';
?>
<h2>Cadastrar Usuário</h2>
<form action="cad_user.php" method="POST">
    <input type="text" name="nome" id="nome"  placeholder="Nome" required><br><br>
    <input type="text" name="sobrenome" id="sobrenome" placeholder="sobrenome" required><br><br>
    <input type="email" name="email" id="email" placeholder="e-mail" required><br><br>
    <input type="password" name="senha" id="senha" placeholder="senha" required><br><br>
    <button type="submit">Salvar</button>
</form> 
<?php include_once 'footer.php'; ?>