<?php
// A sessão já é iniciada dentro do autentica.php, então não precisamos iniciar aqui.
include 'autentica.php';

// O header.php abre a estrutura da página e a <div class="content">.
include 'header.php';
?>

<h1 class="titleTop">Área Administrativa</h1>

<h2 style="text-align: center;">Bem-vindo, <strong><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></strong>!</h2>
<p style="text-align: center;">Use o menu para navegar ou utilize os atalhos abaixo:</p>

<div class="dashboard-botoes">
    <a href="/confeitaria/crud/listar_produtos.php" class="btn-dashboard btn-gerenciar">Gerenciar Cardápio</a>
    <a href="/confeitaria/php/meus_pedidos.php" class="btn-dashboard btn-ver-form">Meus Pedidos</a>
</div>

<?php
// O footer.php fecha a </div> e o restante da página.
include 'footer.php'; 
?>