<?php
include 'conect.php';

// Verifica se um ID foi passado pela URL
if (!isset($_GET['id'])) {
    // Se não, redireciona para a página inicial
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

// Busca os dados do produto específico
$sql = "SELECT * FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

// Se não encontrou o produto, redireciona
if ($resultado->num_rows === 0) {
    header('Location: index.php');
    exit();
}

$produto = $resultado->fetch_assoc();

// O header aqui é diferente, pois o título da página é o nome do produto
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($produto['nome']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/confeitaria/css/style.css">
    <link rel="icon" href="/confeitaria/img/logo.jpg" type="image/jpeg">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="content">
        
        <h1 class="titleTop"><?= htmlspecialchars($produto['nome']) ?></h1>
        
        <div class="descricao-produto">
            <img class="produto-img" src="<?= htmlspecialchars($produto['imagem_url']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
            <p><?= nl2br(htmlspecialchars($produto['descricao'])) ?></p> <p class="produto-preco">Valor: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        </div>

        <div class="area-botao-inferior">
            <a href="index.php" class="btn-voltar">Voltar ao Cardápio</a>
        </div>
        
    </div>
</body>
</html>