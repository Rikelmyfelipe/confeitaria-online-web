<?php
session_start();
include '../php/autentica_admin.php';
include '../php/conect.php';

$mensagem = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagem_url_db = ''; // Inicia a variável do caminho da imagem

    // --- LÓGICA DE UPLOAD DA IMAGEM ---
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $pasta_destino = "../img/";
        $nome_arquivo = uniqid() . '_' . basename($_FILES['imagem']['name']);
        $caminho_completo = $pasta_destino . $nome_arquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
            $imagem_url_db = "/confeitaria/img/" . $nome_arquivo;
        } else {
            $mensagem = "<p style='color:red; text-align: center;'>Erro ao fazer upload da imagem.</p>";
        }
    } else {
        $mensagem = "<p style='color:red; text-align: center;'>Você precisa enviar uma imagem.</p>";
    }
    // --- FIM DA LÓGICA DE UPLOAD ---

    // Se a imagem foi enviada com sucesso, continua para salvar no banco
    if ($imagem_url_db != '') {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao']; // <-- Pega a nova descrição
        $categoria_id = $_POST['categoria_id'];

        // SQL atualizado para incluir a coluna 'descricao'
        $sql = "INSERT INTO produtos (nome, preco, imagem_url, descricao, categoria_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        // Bind_param atualizado com um "s" a mais para a string da descrição
        $stmt->bind_param("sdssi", $nome, $preco, $imagem_url_db, $descricao, $categoria_id);

        if ($stmt->execute()) {
            $mensagem = "<p style='color:green; text-align: center; margin-top: -33px;'>Produto cadastrado com sucesso!</p>";
        } else {
            $mensagem = "<p style='color:red; text-align: center; margin-top: -33px;'>Erro ao cadastrar produto: " . $stmt->error . "</p>";
        }
    }
}

$categorias = $conn->query("SELECT * FROM categorias");

include '../php/header.php';
?>

<h1 class="titleTop">Cadastrar Produto</h1>

<?php echo $mensagem; ?>

<form method="post" enctype="multipart/form-data" class="form-ajustado">
    <div class="form-group">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="imagem">Foto do Produto:</label>
        <input type="file" id="imagem" name="imagem" required>
    </div>

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva o produto, ingredientes, etc." required></textarea>
    </div>

    <div class="form-group">
        <label for="categoria_id">Categoria:</label>
        <select id="categoria_id" name="categoria_id" required>
            <?php while ($cat = $categorias->fetch_assoc()): ?>
                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nome']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <input type="submit" class="form-submit" value="Cadastrar">
</form>

<div class="area-botao-inferior">
    <a href="listar_produtos.php" class="btn-voltar">Voltar para a Lista</a>
</div>

<?php
include '../php/footer.php';
?>