<?php
session_start();
include 'autentica.php';
include 'conect.php';
include 'header.php';

// Pega o ID do usuário da sessão para buscar apenas os pedidos dele
$usuario_id = $_SESSION['usuario_id'];

// Busca os pedidos do usuário logado
$sql = "SELECT * FROM pedidos WHERE usuario_id = ? ORDER BY data_pedido DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<h1 class="titleTop">Meus Pedidos</h1>

<div class="container-meus-pedidos">

    <table class="tabela-meus-pedidos">
        <tr>
            <th>Data do Pedido</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Cliente</th>
        </tr>
        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while ($pedido = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= date('d/m/Y H:i', strtotime($pedido['data_pedido'])) ?></td>
                <td><?= htmlspecialchars($pedido['produto_nome']) ?></td>
                <td><?= $pedido['quantidade'] ?></td>
                <td><?= htmlspecialchars($pedido['nome_cliente']) ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align:center;">Você ainda não fez nenhum pedido.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="area-botao-meus-pedidos">
        <a href="dashboard.php" class="btn-voltar">Voltar ao Dashboard</a>
    </div>

</div>

<?php
include 'footer.php';
?>