<?php
// Garante que a sessão seja iniciada (se já não foi)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// PASSO 1: Descobrir o nome do arquivo da página atual.
// Ex: Se você está em www.site.com/confeitaria/php/index.php, a variável será "index.php"
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <a <?php if ($pagina_atual == 'index.php') echo 'class="active"'; ?> href="/confeitaria/php/index.php">Início</a>
    
    <a <?php if ($pagina_atual == 'form.php') echo 'class="active"'; ?> href="/confeitaria/php/form.php">Faça sua Encomenda</a>
    
    <a <?php if ($pagina_atual == 'about.php') echo 'class="active"'; ?> href="/confeitaria/php/about.php">Sobre</a>

    <?php if (isset($_SESSION['usuario_nome'])): ?>
        <a <?php if ($pagina_atual == 'dashboard.php') echo 'class="active"'; ?> href="/confeitaria/php/dashboard.php">Área Administrativa</a>
        <a href="/confeitaria/php/logout.php">Sair</a> <?php else: ?>
        <a <?php if ($pagina_atual == 'login.php') echo 'class="active"'; ?> href="/confeitaria/php/login.php">Login</a>
    <?php endif; ?>
</div>