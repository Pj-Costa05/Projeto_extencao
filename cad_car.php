
<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO carros ( nome, montadora, ano, placa) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['nome'], $_POST['montadora'], $_POST['ano'], $_POST['placa']]);
        header("Location: show_car.php?msg=sucesso");
        exit;   
    } catch (Exception $e) {
        header("Location: show_car.php?msg=erro");
        exit;
    }
}
include_once 'header.php';
?>
<h2>Cadastrar Carros</h2>
<form action="cad_car.php" method="POST">
    <input type="text" name="nome" id="nome"  placeholder="Nome" required><br><br>
    <input type="text" name="montadora" id="montadora" placeholder="Montadora" required><br><br>
    <input type="text" name="ano" id="ano" placeholder="Ano" required><br><br>
    <input type="text" name="placa" id="placa" placeholder="Placa" required><br><br>
    <button type="submit">Salvar</button>
</form>


<?php include_once 'footer.php';?>