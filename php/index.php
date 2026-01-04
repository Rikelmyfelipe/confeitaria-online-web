<?php
// Inclui a conexão com o banco e o header da página
include 'conect.php'; 
include 'header.php'; 

// Busca todos os produtos no banco de dados
$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);
?>

<h1 class="titleTop">Cardápio</h1>

<div class="menu-grid">
    
    <?php // Inicia o loop para criar um card para cada produto encontrado ?>
    <?php while ($produto = $resultado->fetch_assoc()): ?>

        <a class="item" href="produto_detalhe.php?id=<?= $produto['id'] ?>">
            
            <img src="<?= htmlspecialchars($produto['imagem_url']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
            
            <span class="nome-doce"><?= htmlspecialchars($produto['nome']) ?></span>

        </a>

    <?php endwhile; // Fim do loop ?>

</div>

<?php
// Inclui o rodapé da página
include 'footer.php';
?>