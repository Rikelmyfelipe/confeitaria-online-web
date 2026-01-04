<?php
session_start();
include 'autentica.php';
include 'conect.php';

// Pega os dados do formulário
$dados = $_POST;
// Pega o ID do usuário logado na sessão
$usuario_id = $_SESSION['usuario_id'];

// Prepara o SQL para inserir o pedido no banco de dados
$sql = "INSERT INTO pedidos (usuario_id, nome_cliente, telefone, email, endereco, produto_nome, quantidade) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
// Associa as variáveis aos parâmetros do SQL
$stmt->bind_param("isssssi", 
    $usuario_id, 
    $dados['nome'], 
    $dados['telefone'], 
    $dados['email'], 
    $dados['endereco'], 
    $dados['produto'], 
    $dados['quantidade']
);

// Executa o comando e verifica se deu certo
if ($stmt->execute()) {
    $mensagem_sucesso = "Seu pedido foi registrado com sucesso!";
} else {
    $mensagem_erro = "Ocorreu um erro ao registrar seu pedido: " . $stmt->error;
}

// Inclui o cabeçalho da página
include 'header.php';
?>

<h1 class="titleTop">Status do Pedido</h1>

<div class="resumo-pedido" style="text-align: center;">
    <?php
    // Mostra a mensagem de sucesso ou erro
    if (isset($mensagem_sucesso)) {
        echo "<h3 style='color:green;'>$mensagem_sucesso</h3>";
        echo "<p>Em breve entraremos em contato para confirmar os detalhes.</p>";
    }
    if (isset($mensagem_erro)) {
        echo "<h3 style='color:red;'>$mensagem_erro</h3>";
    }
    ?>
    <br>
    <a href="index.php" class="btn-voltar" style="background-color:#6c757d;">Voltar ao Cardápio</a>
</div>

<?php
include 'footer.php';
?>