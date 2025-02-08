<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind CSS -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- Scripts JS e JQuery-->
    <script src="../../public/js/funcoesGerais.js" defer></script>
    <script src="../../public/js/moduloCadastro/cadastro-usuario.js" defer></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- CDN de ícones do Remix Icons -->
    <link href=" https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css " rel="stylesheet">
    <link rel="shortcut icon" href="../../public/img/Favicon.svg" type="image/x-icon">
    <title>Cadastre-se - Patinhas Felizes</title>
</head>
<body class="flex h-full flex-row">
    <div class="relative flex min-h-full shrink-0 justify-center md:px-12 lg:px-0 ">
        <div class="relative z-10 flex flex-1 flex-col bg-white px-4 py-10 shadow-2xl sm:justify-center md:flex-none md:px-28 page">
            <main class="mx-auto w-full max-w-md sm:px-4 md:w-96 md:max-w-sm md:px-0">
                <div class="flex">
                    <a aria-label="Home" href="../index.php">
                        <img src="../../public/img/Logo.svg" alt="Patinhas Felizes">
                    </a>
                </div>
                <h2 class="mt-20 text-lg font-semibold text-gray-900">Crie sua conta</h2>
                <p class="mt-2 text-sm text-gray-700">
                    Já possui uma conta?
                    <a class="font-medium text-blue-600 hover:underline" href="../login/login.php">Faça login aqui!</a>
                </p>
                <form class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2" method="post" action="../../controller/InicioCadastro.php">
                    <div>
                        <label for="nomeUsuarioCadastro" class="mb-3 block text-sm font-medium text-gray-700">Nome <span class="text-red-600">*</span></label>
                        <input type="text" name="nomeUsuarioCadastro" id="nomeUsuarioCadastro" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" />
                    </div>
                    <div>
                        <label for="sobrenomeUsuarioCadastro" class="mb-3 block text-sm font-medium text-gray-700">Sobrenome <span class="text-red-600">*</span></label>
                        <input type="text" name="sobrenomeUsuarioCadastro" id="sobrenomeUsuarioCadastro" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" />
                    </div>
                    <div class="col-span-full">
                        <label for="emailUsuarioCadastro" class="mb-3 block text-sm font-medium text-gray-700">Email <span class="text-red-600">*</span></label>
                        <input type="email" name="emailUsuarioCadastro" id="emailUsuarioCadastro" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" />
                    </div>
                    <div class="col-span-full">
                        <label for="cpfUsuarioCadastro" class="mb-3 block text-sm font-medium text-gray-700">CPF <span class="text-red-600">*</span></label>
                        <input type="text" name="cpfUsuarioCadastro" id="cpfUsuarioCadastro" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" oninput="this.value = formatarCPF(this.value)" onblur="validarCPF(this.value)" maxlength="14" />
                        <h6 class="text-sm" id="retornoValidacao"></h6>
                        <input type="text" class="hidden" id="validaCpf" name="validaCpf">
                    </div>
                    <div class="col-span-full relative">
                        <label for="senhaUsuarioCadastro" class="mb-3 block text-sm font-medium text-gray-700">Senha <span class="text-red-600">*</span></label>
                        <span class="absolute top-10 right-4 cursor-pointer" id="showPass1"><i class="ri-eye-line" id="iconShowPass1"></i></span>
                        <input type="password" name="senhaUsuarioCadastro" id="senhaUsuarioCadastro" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm" onblur="validarSenha(this.value)" />
                        <h6 class="text-sm" id="retornoValidacaoSenha"></h6>
                        <input type="text" class="hidden" id="validaSenha" name="validaSenha">
                    </div>
                    <div class="col-span-full relative">
                        <label for="senhaConfirmaUsuarioCadastro" class="mb-3 block text-sm font-medium text-gray-700">Confirma Senha <span class="text-red-600">*</span></label>
                        <span class="absolute top-10 right-4 cursor-pointer" id="showPass2"><i class="ri-eye-line" id="iconShowPass2"></i></span>
                        <input type="password" name="senhaConfirmaUsuarioCadastro" id="senhaConfirmaUsuarioCadastro" class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-hidden focus:ring-blue-500 sm:text-sm"/>
                    </div>
                    <div class="col-span-full">
                        <label for="termosUsuarioCadastro" class="block text-sm font-medium text-gray-700">
                            <input type="checkbox" name="termosUsuarioCadastro" id="termosUsuarioCadastro" class="mr-2" />
                            Aceito os <a href="#" class="text-blue-600 hover:underline">termos de uso</a> e a <a href="#" class="text-blue-600 hover:underline">política de privacidade</a> do Patinhas Felizes.
                        </label>
                    </div>
                    <div class="col-span-full">
                        <button type="submit" name="btnCadastrarUsuario" id="btnCadastrarUsuario" class="group inline-flex items-center justify-center rounded-full py-2 px-4 text-sm font-semibold focus:outline-hidden focus-visible:outline-2 focus-visible:outline-offset-2 bg-orange-400 text-white hover:text-slate-100 hover:bg-orange-500 active:bg-orange-400 active:text-orange-100 focus-visible:outline-orange-600 w-full cursor-pointer" variant="solid" color="orange">
                            <span>
                                Cadastrar
                                <span aria-hidden="true">→</span>
                            </span>
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>
    <div class="gradiente"></div>
</body>
<style>
    .gradiente {
        background: linear-gradient(120deg, #FF9900 0%, #995C00 100%);
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 0;
    }

    .page {
        height: 100vh;
    }
</style>
</html>