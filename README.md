# 🍰 Confeitaria Online — Aplicação Web Full Stack

Aplicação web full stack para gestão de produtos de uma confeitaria, desenvolvida com **PHP nativo**, **MySQL** e **JavaScript**.  
O sistema contempla autenticação de usuários, CRUD completo de produtos, upload de imagens e organização modular do código.

Projeto acadêmico com foco em aprendizado prático, boas práticas de desenvolvimento web e versionamento de código.

---

## 🚀 Funcionalidades

- **Autenticação Segura:** Login para usuários e administradores.
- **CRUD Completo:** Cadastro, leitura, edição e exclusão de produtos.
- **Gestão de Categorias:** Organização dinâmica dos itens.
- **Upload de Imagens:** Gerenciamento visual dos produtos.
- **Estrutura Modular:** Código organizado por responsabilidade.
- **Interface Responsiva:** HTML, CSS e JavaScript.

---

## 🛠️ Tecnologias Utilizadas

- **Back-end:** PHP (Nativo)
- **Banco de Dados:** MySQL
- **Front-end:** HTML5, CSS3, JavaScript
- **Versionamento:** Git e GitHub

---

## 📁 Estrutura do Projeto
```
├── crud/ # Operações de CRUD dos produtos
│ ├── cadastrar_produto/
│ ├── editar_produto/
│ ├── excluir_produto/
│ └── listar_produtos/
|
├── css/ # Arquivos de estilo
├── img/ # Imagens dos produtos
|
├── php/ # Lógica do sistema
│ ├── autentica.php # Autenticação
│ ├── dashboard.php # Área administrativa
│ ├── conect.php # Conexão com banco de dados
│ └── layout/ # Componentes reutilizáveis (header/footer)
│
├── script/ # Scripts JavaScript
├── confeitaria.sql # Estrutura do banco de dados (SQL)
```
---

## 🗄️ Banco de Dados

A estrutura do banco de dados está disponível no arquivo: `confeitaria.sql`.

### Tabelas principais:
- `usuarios`
- `produtos`
- `categorias`
- `pedidos`

### Como importar:
1. Acesse o **phpMyAdmin** (ou seu gerenciador de preferência).
2. Crie um banco de dados (ex: `confeitaria_db`).
3. Clique em **Importar**.
4. Selecione o arquivo `confeitaria.sql` deste repositório.

---

## ⚙️ Como Executar o Projeto Localmente

1. **Clone o repositório:**
```bash
git clone https://github.com/Rikelmyfelipe/confeitaria-online-web.git
```
2. Configure o Servidor: Coloque a pasta do projeto no diretório raiz do seu servidor local (htdocs no XAMPP, www no WAMP, etc).
3. Configure o Banco: Verifique as credenciais no arquivo php/conect.php (usuário, senha e nome do banco).
4. Acesse: Abra no navegador: http://localhost/confeitaria

---

## 🎯 Objetivo do Projeto

Este projeto foi desenvolvido com fins educacionais para a disciplina de Análise e Desenvolvimento de Sistemas, visando praticar:

● Desenvolvimento web com PHP sem frameworks.

● Integração e manipulação de banco de dados MySQL.

● Padrões de organização de código e arquitetura.

● Documentação e versionamento profissional.

--- 

## 👨‍💻 Autor

Rikelmy Felipe Ribeiro Silva - 
Estudante de Análise e Desenvolvimento de Sistemas

● GitHub: https://github.com/Rikelmyfelipe
