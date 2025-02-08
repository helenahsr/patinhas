<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/img/Favicon.svg" type="image/x-icon">
    <title>Cadastro Completo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../public/js/funcoesGerais.js" defer></script>
    <script>
        function showModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function nextStep(current, next) {
            document.getElementById('step' + current).classList.add('hidden');
            document.getElementById('step' + next).classList.remove('hidden');
        }

        function buscarCep() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById('rua').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('estado').value = data.uf;
                            document.getElementById('pais').value = "Brasil";
                        } else {
                            alert('CEP não encontrado!');
                        }
                    })
                    .catch(error => console.error('Erro ao buscar o CEP:', error));
            }
        }
    </script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-r from-orange-300 to-orange-400" onload="showModal()">
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center">
            <h2 class="text-xl font-bold mb-4">Cadastro Concluído!</h2>
            <p class="mb-4">Agora complete seu cadastro informando os dados abaixo.</p>
            <button onclick="closeModal()" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600">Continuar</button>
        </div>
    </div>
    
    <?php
    session_start();
    
    $dados_preenchidos = isset($_SESSION['dados_preenchidos']) ? $_SESSION['dados_preenchidos'] : false;
    ?>

    <?php if (!$dados_preenchidos): ?>
        <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-2xl">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Complete seu cadastro</h2>
            <form action="salvar_dados.php" method="POST">
                <div id="step1">
                    <div class="mb-6">
                        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone <span class="text-red-600">*</span></label>
                        <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="telefone" name="telefone"  oninput="this.value = formatarTelefone(this.value)" maxlength="15" required>
                    </div>
                    <button type="button" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600" onclick="nextStep(1, 2)">Próximo</button>
                </div>
                <div id="step2" class="hidden">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mb-4">
                            <?= $_SESSION['uid']; ?>
                            <?= $_SESSION['uname']; ?>
                            <label for="cep" class="block text-sm font-medium text-gray-700">CEP <span class="text-red-600">*</span></label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="cep" name="cep" required onblur="buscarCep()">
                        </div>
                        <div class="mb-4">
                            <label for="rua" class="block text-sm font-medium text-gray-700">Rua <span class="text-red-600">*</span></label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="rua" name="rua" required>
                        </div>
                        <div class="mb-4">
                            <label for="rua" class="block text-sm font-medium text-gray-700">Bairro <span class="text-red-600">*</span></label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="bairro" name="bairro" required>
                        </div>
                        <div class="mb-4">
                            <label for="rua" class="block text-sm font-medium text-gray-700">Cidade <span class="text-red-600">*</span></label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="cidade" name="cidade" required>
                        </div>
                        <div class="mb-4">
                            <label for="rua" class="block text-sm font-medium text-gray-700">Estado <span class="text-red-600">*</span></label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="estado" name="estado" required>
                        </div>
                        <div class="mb-4">
                            <label for="rua" class="block text-sm font-medium text-gray-700">País <span class="text-red-600">*</span></label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="pais" name="pais" required>
                        </div>
                        <div class="mb-4">
                            <label for="numero" class="block text-sm font-medium text-gray-700">Número <span class="text-red-600">*</span></label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="numero" name="numero" required>
                        </div>
                        <div class="mb-4">
                            <label for="complemento" class="block text-sm font-medium text-gray-700">Complemento</label>
                            <input type="text" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" id="complemento" name="complemento">
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <button type="button" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="nextStep(2, 1)">Voltar</button>
                        <button type="submit" name="btnSalvarInformacoesComplementares" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>
</body>
</html>