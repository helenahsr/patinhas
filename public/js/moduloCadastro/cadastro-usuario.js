$('#showPass1').on('click', function (e) {

    let password = document.getElementById("senhaUsuarioCadastro");
    let showPassSpan = document.getElementById("showPass1");
    let showPassIcon = document.getElementById("iconShowPass1");
  
    if (password.type === "password") {
      password.type = "text";
      showPassIcon.classList.remove("ri-eye-line");
      showPassIcon.classList.add("ri-eye-close-line");
    } else {
      password.type = "password";
      showPassIcon.classList.remove("ri-eye-close-line");
      showPassIcon.classList.add("ri-eye-line");
    }
  });
  
  $('#showPass2').on('click', function (e) {
  
    let password = document.getElementById("senhaConfirmaUsuarioCadastro");
    let showPassSpan = document.getElementById("showPass2");
    let showPassIcon = document.getElementById("iconShowPass2");
  
    if (password.type === "password") {
      password.type = "text";
      showPassIcon.classList.remove("ri-eye-line");
      showPassIcon.classList.add("ri-eye-close-line");
    } else {
      password.type = "password";
      showPassIcon.classList.remove("ri-eye-close-line");
      showPassIcon.classList.add("ri-eye-line");
    }
  });

  function validarEmail(email) {
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regexEmail.test(email);
}

  
  $('#btnCadastrarUsuario').on('click', function (e) {
    const textInputs = document.querySelectorAll('input[type="text"]');
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    const emailInput = document.getElementById("emailUsuarioCadastro");
    
    let camposVazios = false;

    textInputs.forEach(input => {
        if (input.value.trim() === "") {
            camposVazios = true;
        }
    });

    passwordInputs.forEach(input => {
        if (input.value.trim() === "") {
            camposVazios = true;
        }
    });

    if (camposVazios && emailInput.value.trim() === "") {
        e.preventDefault();
        alert('Preencha todos os campos!');
    }
    else {
        if (!validarEmail(emailInput.value)) {
            e.preventDefault(); // Impede o envio do formulário
            alert('E-mail inválido! Por favor, insira um e-mail válido.');
        }
        else {
            if (document.getElementById("validaCpf").value === "false") {
                e.preventDefault();
                alert('CPF inválido!');
            }
            else {
                let senha = document.getElementById("senhaUsuarioCadastro").value;
                let confirmaSenha = document.getElementById("senhaConfirmaUsuarioCadastro").value;
        
                if (senha !== confirmaSenha) {
                    e.preventDefault();
                    alert('As senhas não coincidem!');
                }
                else {
                    let checkboxTermos = document.getElementById("termosUsuarioCadastro");
                    if (!checkboxTermos.checked) {
                        e.preventDefault();
                        alert('Aceite os termos de uso!');
                    }
                    else {
                        alert('Usuário cadastrado com sucesso!');
                    }
                }
            }
        }
    }
});
