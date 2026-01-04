<?php
session_start();
include 'conect.php';

$erro = null; // Inicia a variável de erro como nula

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {
        if (password_verify($senha, $usuario['senha'])) {
            // Sucesso no login
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];
            header("Location: dashboard.php");
            exit();
        }
    }
    
    // Se chegou até aqui, o login falhou. Define uma mensagem de erro genérica.
    $erro = "Email ou senha incorretos.";
}

// O header.php já inclui o menu, não precisamos chamar menu.php aqui
include 'header.php'; 
?>

<h1 class="titleTop">Login</h1>

<form method="post" class="superior">
    
    <?php 
    // AQUI ESTÁ A MUDANÇA: A mensagem de erro agora fica DENTRO do formulário
    if (isset($erro)) {
        echo "<div class='mensagem-erro'>$erro</div>"; 
    }
    ?>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <input type="password" name="senha" required>
    </div>
    <input class="form-submit" type="submit" value="Entrar">
</form>

<p style="text-align:center">Ainda não tem conta? <a href="register.php">Cadastre-se aqui</a>.</p>

<?php 
include 'footer.php'; 
?>