// Quando a página for carregada
document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM carregado. O script está rodando.");

     // Validação do formulário e máscara de telefone
    const form = document.querySelector('form');
    if (form) {
        console.log("Formulário encontrado na página.");
        form.addEventListener('submit', function (event) {
            console.log("Botão de submit clicado. Iniciando validação...");
            // A validação agora é chamada aqui. Se for falsa, o envio é bloqueado.
            if (!validarFormulario()) {
                console.log("Validação falhou. Envio do formulário cancelado.");
                event.preventDefault(); // Impede o envio do formulário
            } else {
                console.log("Validação bem-sucedida. Enviando formulário.");
            }
        });
        
        // CORREÇÃO: Unificamos o ID para "telefone"
        const campoTelefone = document.getElementById('telefone');
        if (campoTelefone) {
            console.log("Campo de telefone encontrado. Adicionando máscara.");
            // CORREÇÃO: Usando o evento 'input' que é mais confiável que 'keydown' para máscaras
            campoTelefone.addEventListener('input', mascaraTelefone);
        }
    }

    // --- LÓGICA DA PÁGINA DE RESUMO (formAction.html) ---
    if (document.querySelector('.resumo-pedido')) {
        console.log("Página de resumo detectada. Preenchendo dados.");
        preencherResumoDoPedido();
    }
});

/**
 * Função que valida todos os campos do formulário de encomenda.
 * @returns {boolean} - Retorna 'true' se todos os campos forem válidos, e 'false' caso contrário.
 */
function validarFormulario() {
    const nome = document.getElementById("nome").value.trim();
    // CORREÇÃO: Unificamos o ID para "telefone"
    const telefone = document.getElementById("telefone").value.replace(/\D/g, "");
    const email = document.getElementById("email").value.trim();
    const endereco = document.getElementById("endereco").value.trim();
    const produto = document.getElementById("produto").value;
    const quantidade = document.getElementById("quantidade").value;

    if (nome.length < 3) {
        alert("O nome precisa ter pelo menos 3 caracteres.");
        return false;
    }

    if (!/^\d{10,11}$/.test(telefone)) {
        alert("Telefone inválido. Insira um número com DDD (10 ou 11 dígitos). O seu tem " + telefone.length + " dígitos.");
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Formato de email inválido.");
        return false;
    }

    if (endereco.length < 5) {
        alert("Por favor, insira um endereço válido.");
        return false;
    }

    if (produto === "") {
        alert("Por favor, escolha um produto do cardápio.");
        return false;
    }
    
    if (isNaN(parseInt(quantidade)) || parseInt(quantidade) <= 0) {
        alert("A quantidade deve ser um número maior que zero.");
        return false;
    }
    
    return true; // Se tudo estiver OK, retorna true
}


function mascaraTelefone(event) {
    let input = event.target;
    let value = input.value.replace(/\D/g, ""); // Remove tudo que não é número
    let formattedValue = "";

    // Limita o número de dígitos para 11 (celular com DDD)
    value = value.substring(0, 11);

    if (value.length > 10) {
        // Formato (xx) xxxxx-xxxx
        formattedValue = value.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
    } else if (value.length > 6) {
        // Formato (xx) xxxx-xxxx
        formattedValue = value.replace(/^(\d{2})(\d{4})(\d{0,4})$/, "($1) $2-$3");
    } else if (value.length > 2) {
        // Formato (xx) xxxx
        formattedValue = value.replace(/^(\d{2})(\d*)/, "($1) $2");
    } else if (value.length > 0) {
        // Formato (xx
        formattedValue = value.replace(/^(\d*)/, "($1");
    }

    input.value = formattedValue;
}

/**
 * Função que lê os parâmetros da URL e preenche a tabela de resumo do pedido.
 */
function preencherResumoDoPedido() {
    const params = new URLSearchParams(window.location.search);
    
    // O 'params.get()' usa o atributo 'name' dos campos do formulário.
    // Como agora o name é "telefone", ele vai funcionar.
    document.getElementById("nome").textContent = params.get("nome") || "Não informado";
    document.getElementById("telefone").textContent = params.get("telefone") || "Não informado";
    document.getElementById("email").textContent = params.get("email") || "Não informado";
    document.getElementById("endereco").textContent = params.get("endereco") || "Não informado";
    document.getElementById("produto").textContent = params.get("produto") || "Não informado";
    document.getElementById("quantidade").textContent = params.get("quantidade") || "Não informado";
}