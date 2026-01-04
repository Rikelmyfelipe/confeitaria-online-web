<?php
// Inicia a sessão APENAS se ela ainda não existir.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. A verificação de login é feita PRIMEIRO.
if (!isset($_SESSION['usuario_id'])) {
    // 2. O caminho para o login foi atualizado para ser absoluto.
    header("Location: /confeitaria/php/login.php");
    exit();
}

// 3. Apenas se o usuário estiver logado, o menu (e o resto da página) é incluído.
// Seguindo nossa estrutura, o menu já está dentro do header.php
// Se esta for uma página completa, o ideal seria:
include 'header.php';

// ...aqui viria o conteúdo da sua página...

include 'footer.php';

?>