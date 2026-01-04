<?php
include '../php/autentica_admin.php';
include '../php/conect.php';
include '../php/header.php';


$sql = "SELECT produtos.*, categorias.nome AS categoria 
        FROM produtos 
        LEFT JOIN categorias ON produtos.categoria_id = categorias.id";
$resultado = $conn->query($sql);
?>

<h1 class="titleTop">Lista de Produtos</h1>

<div class="area-botao-topo">
    <a href="cadastrar_produto.php" class="btn-adicionar">Adicionar Produto</a>
</div>

<table border="1" cellpadding="5" class="tabela-centralizada">
    <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Ações</th>
    </tr>
    <?php while ($linha = $resultado->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($linha['nome']) ?></td>
        <td>R$ <?= number_format($linha['preco'], 2, ',', '.') ?></td>
        <td><?= htmlspecialchars($linha['categoria']) ?></td>
        
        <td>
            <a href="editar_produto.php?id=<?= $linha['id'] ?>" class="btn-editar">Editar</a> 
            <a href="excluir_produto.php?id=<?= $linha['id'] ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir esse produto ?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>