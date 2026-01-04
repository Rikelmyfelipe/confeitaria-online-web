<?php
// Incluímos o header, que já chama o menu e inicia a sessão se necessário.
include 'header.php';
?>

<h1 class="titleTop">Sobre o Projeto CandyLovers</h1>

<div class="about-container">
    <p><strong>CandyLovers</strong> é uma aplicação web completa que simula um sistema de confeitaria online. O projeto foi desenvolvido para demonstrar competências essenciais em desenvolvimento full-stack, abrangendo desde a estruturação do banco de dados e lógica de back-end com PHP e MySQL, até a criação de uma interface de usuário interativa e padronizada com HTML, CSS e JavaScript.</p>
    <p>Este projeto cumpre todos os requisitos da avaliação somativa da disciplina de Desenvolvimento Web, apresentando um sistema robusto com múltiplas funcionalidades.</p>

    <h2>Tecnologias Utilizadas</h2>
    <ul>
        <li><strong>Front-end:</strong> HTML5, CSS3, JavaScript</li>
        <li><strong>Back-end:</strong> PHP</li>
        <li><strong>Banco de Dados:</strong> MySQL</li>
    </ul>

    <h2>Funcionalidades Implementadas</h2>
    <p>O sistema é dividido em áreas com diferentes níveis de acesso e funcionalidades:</p>
    
    <h4>Área Pública (Para todos os visitantes)</h4>
    <ul>
        <li><strong>Cardápio Dinâmico:</strong> A página inicial exibe os produtos diretamente do banco de dados, sendo atualizada em tempo real conforme o administrador gerencia o cardápio.</li>
        <li><strong>Páginas de Detalhes dos Produtos:</strong> Ao clicar em um produto, uma página com sua descrição completa, foto e preço é gerada dinamicamente.</li>
        <li><strong>Sistema de Cadastro e Login:</strong> Usuários podem se cadastrar e realizar login no sistema.</li>
    </ul>

    <h4>Área do Cliente (Requer Login)</h4>
    <ul>
        <li><strong>Histórico de Pedidos:</strong> Clientes logados podem visualizar um resumo de todas as encomendas que já realizaram.</li>
        <li><strong>Realização de Encomendas:</strong> O formulário de encomenda captura os dados do cliente para registro no sistema.</li>
    </ul>

    <h4>Área Administrativa (Acesso restrito ao "dono")</h4>
    <ul>
        <li><strong>Gerenciamento de Produtos (CRUD Completo):</strong> O administrador possui controle total sobre o cardápio, com funcionalidades para:
            <ul>
                <li><strong>Criar (INSERT):</strong> Adicionar novos produtos, com nome, preço, descrição e upload de imagem.</li>
                <li><strong>Ler (SELECT):</strong> Listar todos os produtos cadastrados em uma tabela.</li>
                <li><strong>Atualizar (UPDATE):</strong> Editar todas as informações de um produto existente, incluindo a troca da imagem.</li>
                <li><strong>Deletar (DELETE):</strong> Remover produtos do cardápio e do banco de dados.</li>
            </ul>
        </li>
    </ul>

    <h2>Estrutura do Banco de Dados e Segurança</h2>
    <p>O sistema utiliza um banco de dados MySQL com tabelas que se relacionam para garantir a integridade dos dados, como o relacionamento 1xN (um para muitos) entre `categorias` e `produtos`, e entre `usuarios` e `pedidos`.</p>
    <p>A segurança é um pilar do projeto, com a implementação de um sistema de autenticação que inclui:</p>
    <ul>
        <li><strong>Senhas Criptografadas:</strong> As senhas dos usuários são armazenadas no banco de dados usando hashing seguro (password_hash).</li>
        <li><strong>Controle de Acesso:</strong> Páginas administrativas são protegidas por um script (`autentica_admin.php`) que verifica se o usuário está logado e se possui o nível de acesso "admin", garantindo que apenas o dono da loja possa gerenciar o conteúdo.</li>
    </ul>

    <h2>Autor</h2>
    <p>Nome: <strong>Rikelmy Felipe Ribeiro Silva</strong></p>
    <p>Curso: Análise e Desenvolvimento de Sistemas</p>
    <p>Instituição: PUC-PR</p>
    <p>Contato: <a href="mailto:rikelmyfelipe1@gmail.com">rikelmyfelipe1@gmail.com</a></p>
</div>

<?php
include 'footer.php';
?>