<?php
session_start();
include '../php/autentica_admin.php';
include '../php/conect.php';

$id = $_GET['id'];
$mensagem = '';

// Busca os dados atuais do produto para preencher o formulário
$sql_produto = "SELECT * FROM produtos WHERE id = ?";
$stmt_produto = $conn->prepare($sql_produto);
$stmt_produto->bind_param("i", $id);
$stmt_produto->execute();
$produto = $stmt_produto->get_result()->fetch_assoc();
$imagem_url_atual = $produto['imagem_url'];


// Lógica para ATUALIZAR o produto (quando o formulário é enviado)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caminho_imagem_db = $imagem_url_atual; // Por padrão, mantém a imagem antiga

    // Lógica de upload da nova imagem (se houver)
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0 && $_FILES['imagem']['size'] > 0) {
        $pasta_destino = "../img/";
        $nome_arquivo = uniqid() . '_' . basename($_FILES['imagem']['name']);
        $caminho_completo = $pasta_destino . $nome_arquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
            $caminho_imagem_db = "/confeitaria/img/" . $nome_arquivo;
        } else {
            $mensagem = "<p style='color:red; text-align: center;'>Erro ao fazer upload da nova imagem.</p>";
        }
    }

    // Se não houve erro de upload, continua para atualizar o banco
    if (strpos($mensagem, 'Erro') === false) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao']; // <-- Pega a nova descrição
        $categoria_id = $_POST['categoria_id'];

        // SQL atualizado para incluir a coluna 'descricao'
        $sql_update = "UPDATE produtos SET nome = ?, preco = ?, imagem_url = ?, descricao = ?, categoria_id = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        // Bind_param atualizado com um "s" a mais para a string da descrição
        $stmt_update->bind_param("sdssii", $nome, $preco, $caminho_imagem_db, $descricao, $categoria_id, $id);

        if ($stmt_update->execute()) {
            $mensagem = "<p style='color:green; text-align: center; margin-top: -33px;'>Produto atualizado com sucesso!</p>";
            // Recarrega os dados do produto para exibir as informações atualizadas
            $stmt_produto->execute();
            $produto = $stmt_produto->get_result()->fetch_assoc();
        } else {
            $mensagem = "<p style='color:red; text-align: center; margin-top: -33px;'>Erro ao atualizar o produto: " . $stmt_update->error . "</p>";
        }
    }
}

// Busca todas as categorias para o select
$categorias = $conn->query("SELECT * FROM categorias");

include '../php/header.php';
?>

<h1 class="titleTop">Editar Produto</h1>

<?php echo $mensagem; ?>

<form method="post" enctype="multipart/form-data" class="form-ajustado">
    <div class="form-group">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required>
    </div>
    <div class="form-group">
        <label>Imagem Atual:</label>
        <img src="<?= htmlspecialchars($produto['imagem_url']) ?>" alt="Imagem Atual" style="max-width: 200px; border-radius: 8px; margin-top: 5px;">
    </div>
    <div class="form-group">
        <label for="imagem">Enviar Nova Imagem (opcional):</label>
        <input type="file" id="imagem" name="imagem">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" required><?= htmlspecialchars($produto['descricao']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="categoria_id">Categoria:</label>
        <select id="categoria_id" name="categoria_id" required>
            <?php while ($cat = $categorias->fetch_assoc()): ?>
                <option value="<?= $cat['id'] ?>" <?php if ($cat['id'] == $produto['categoria_id']) echo 'selected'; ?>>
                    <?= htmlspecialchars($cat['nome']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <input type="submit" class="form-submit" value="Atualizar">
</form>

<div class="area-botao-inferior">
    <a href="listar_produtos.php" class="btn-voltar">Voltar para a Lista</a>
</div>

<?php
include '../php/footer.php';
?>