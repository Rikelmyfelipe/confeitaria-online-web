<?php
// Primeiro, executa a autenticação base para ver se o usuário está logado
include 'autentica.php';

// Depois, verifica se o tipo do usuário logado NÃO é 'admin'
if ($_SESSION['usuario_tipo'] !== 'admin') {

    // Se não for admin, montamos uma página de erro completa e independente
    // que não usa header.php nem footer.php
    echo <<<HTML
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acesso Negado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/confeitaria/css/style.css">
    
    <style>
        /* CSS específico para esta página de erro */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* <-- ESTE É O COMANDO QUE TRAVA A ROLAGEM */
            display: flex;
            justify-content: center; /* Centraliza horizontalmente */
            align-items: center;     /* Centraliza verticalmente */
            background-color: #fedddb; /* Fundo igual ao do site */
            font-family: sans-serif;
        }

        .container-acesso-negado {
            max-width: 600px;
            padding: 30px 40px;
            text-align: center;
            background-color: white; /* Cor do container*/
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .container-acesso-negado h1 {
            color: #e74c3c; /* Cor do título */
            margin-top: 0;
            font-size: 28px;
        }

        .container-acesso-negado p {
            font-size: 18px;
            color: #333; /* Cor do texto */
            line-height: 1.6;
        }

        .container-acesso-negado .btn-voltar {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-acesso-negado">
        <h1>Acesso Negado</h1>
        <p>Esta área é restrita e apenas administradores podem acessá-la.</p>
        <a href="/confeitaria/php/dashboard.php" class="btn-voltar">Voltar</a>
    </div>
</body>
</html>
HTML;

    // PARA a execução do script aqui.
    exit();
}
?>