<?php
// O autentica.php verifica se o usuário está logado antes de mostrar a página
include 'autentica.php'; 
// O header.php já inclui o menu, o doctype, o head e abre a div .content
include 'header.php';
?>

<h1 class="titleTop">Formulário de Encomenda</h1>

<form action="form_action.php" method="post">
    <div class="form-group">
        <label for="nome">Nome completo:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>
    </div>
    <div class="form-group">
        <label for="produto">Escolha seu doce:</label>
        <select id="produto" name="produto" required>
            <option value="">Selecione um doce</option>
            <option value="Brownie de Ninho com Nutella">Brownie de Ninho com Nutella</option>
            <option value="Pudim">Pudim</option>
            <option value="Torta de Limão">Torta de Limão</option>
            <option value="Bolo de Cenoura">Bolo de Cenoura</option>
            <option value="Bolo com crocantes de amendoim">Bolo com crocantes de amendoim</option>
            <option value="Bolo de goiaba">Bolo de goiaba</option>
            <option value="Copo de Kinder Bueno">Copo de Kinder Bueno</option>
            <option value="Bolo de 4 leites">Bolo de 4 leites</option>
            <option value="Brigadeiro de Oreo">Brigadeiro de Oreo</option>
        </select>
    </div>
    <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" min="1" required>
    </div>
    <input type="submit" class="form-submit" value="Enviar Pedido">
</form>

<?php
// O footer.php já contém o script.js e fecha as tags </body> e </html>
include 'footer.php';
?>