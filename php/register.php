<?php
// TODA a lógica PHP deve vir antes de qualquer HTML
session_start();
include 'conect.php';

// Inicia as variáveis de mensagem
$mensagem_texto = '';
$mensagem_classe = '';

// Processamento do formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $mensagem_texto = "Usuário cadastrado com sucesso! Você já pode fazer o login.";
        $mensagem_classe = "mensagem-sucesso";
    } else {
        // Verifica se o erro é de email duplicado para uma mensagem mais amigável
        if ($conn->errno == 1062) {
            $mensagem_texto = "Erro: Este endereço de email já está em uso.";
        } else {
            $mensagem_texto = "Erro ao cadastrar: " . $stmt->error;
        }
        $mensagem_classe = "mensagem-erro";
    }
}

// Agora, incluímos o cabeçalho, que vai montar o início da página
include 'header.php';
?>

<h1 class="titleTop">Cadastro de Usuário</h1>

<form method="post" class="superior">

    <?php
    // AQUI ESTÁ A MUDANÇA: Exibe a mensagem dentro do formulário se ela existir
    if (!empty($mensagem_texto)):
    ?>
        <div class="<?= $mensagem_classe ?>">
            <?= $mensagem_texto ?>
        </div>
    <?php 
    endif; 
    ?>

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" required>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <input type="password" name="senha" required>
    </div>
    <input class="form-submit" type="submit" value="Cadastrar">
</form>

<?php 
// O footer fecha a estrutura da página
include 'footer.php'; 
?>