function formatarTelefone(telefone) {
  // Remove caracteres não numéricos
  const numeros = telefone.replace(/\D/g, "");

  // Verifica o tipo de telefone e formata de acordo
  if (numeros.length === 10) {
    // Telefone fixo: (XX) XXXX-XXXX
    return numeros.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
  } else if (numeros.length === 11) {
    // Telefone celular: (XX) XXXXX-XXXX
    return numeros.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
  } else {
    // Se não for possível identificar o tipo de telefone, retorna o número sem formatação
    return telefone;
  }
}

function formatarCPF(cpf) {
  // Remove caracteres não numéricos
  const numeros = cpf.replace(/\D/g, "");

  // Formata o CPF com a máscara XXX.XXX.XXX-XX
  return numeros.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, "$1.$2.$3-$4");
}

function validarCPF(cpf) {
  let retorno = document.getElementById("retornoValidacao");
  let retornoInput = document.getElementById("validaCpf");
  // Remove caracteres não numéricos
  const numeros = cpf.replace(/\D/g, "");

  // Verifica se o CPF tem 11 dígitos
  if (numeros.length !== 11) {
    retorno.innerHTML = "CPF inválido!";
    retorno.classList.add("text-red-400");
    retornoInput.value = "false";
    return false;
  }

  // Verifica se todos os dígitos são iguais (CPF inválido)
  if (/^(\d)\1+$/.test(numeros)) {
    retorno.innerHTML = "CPF inválido!";
    retorno.classList.add("text-red-400");
    retornoInput.value = "false";
    return false;
  }

  // Calcula o primeiro dígito verificador
  let soma = 0;
  for (let i = 0; i < 9; i++) {
    soma += parseInt(numeros.charAt(i)) * (10 - i);
  }
  let resto = soma % 11;
  let digito1 = resto < 2 ? 0 : 11 - resto;

  // Verifica o primeiro dígito verificador
  if (parseInt(numeros.charAt(9)) !== digito1) {
    retorno.innerHTML = "CPF inválido!";
    retorno.classList.add("text-red-400");
    retornoInput.value = "false";
    return false;
  }

  // Calcula o segundo dígito verificador
  soma = 0;
  for (let i = 0; i < 10; i++) {
    soma += parseInt(numeros.charAt(i)) * (11 - i);
  }
  resto = soma % 11;
  let digito2 = resto < 2 ? 0 : 11 - resto;

  // Verifica o segundo dígito verificador
  if (parseInt(numeros.charAt(10)) !== digito2) {
    retorno.innerHTML = "CPF inválido!";
    retorno.classList.add("text-red-400");
    retornoInput.value = "false";
    return false;
  }

  retorno.innerHTML = "CPF válido!";
  retorno.classList.remove("text-red-400");
  retorno.classList.add("text-green-400");
  retornoInput.value = "true";
  return true;
}

function validarSenha(senha) {
  const regexMaiuscula = /[A-Z]/; // Pelo menos uma letra maiúscula
  const regexMinuscula = /[a-z]/; // Pelo menos uma letra minúscula
  const regexNumero = /[0-9]/; // Pelo menos um número
  const regexEspecial = /[\W_]/; // Pelo menos um caractere especial

  retorno = document.getElementById("retornoValidacaoSenha");
  retornoInput = document.getElementById("validaSenha");

  if (regexMaiuscula.test(senha) && regexMinuscula.test(senha) && regexNumero.test(senha) && regexEspecial.test(senha) && senha.length >= 8 ) {
    retorno.innerHTML = "Senha válida!";
    retorno.classList.remove("text-red-400");
    retorno.classList.add("text-green-400");
    retornoInput.value = "true";
    return true;
  }
  else {
    retorno.innerHTML = "Senha inválida! A senha precisa possuir pelo menos 8 caracteres, uma letra maiúscula, uma letra minúscula, um número e um caractere especial.";
    retorno.classList.add("text-red-400");
    retornoInput.value = "false";
    return false;
  }
}
