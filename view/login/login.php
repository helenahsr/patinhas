<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="shortcut icon" href="../../public/img/Favicon.svg" type="image/x-icon">
    <title>Login - Patinhas Felizes</title>
</head>

<body class="flex h-full flex-row ">
    <div class="relative flex min-h-full shrink-0 justify-center md:px-12 lg:px-0 ">
        <div
            class="relative z-10 flex flex-1 flex-col bg-white px-4 py-10 shadow-2xl sm:justify-center md:flex-none md:px-28 page">
            <main class="mx-auto w-full max-w-md sm:px-4 md:w-96 md:max-w-sm md:px-0">
                <div class="flex"><a aria-label="Home" href="../index.php">
                        <img src="../../public/img/Logo.svg" alt="Patinhas Felizes">
                </div>
                <h2 class="mt-20 text-lg font-semibold text-gray-900">Entre com sua conta</h2>
                <p class="mt-2 text-sm text-gray-700">Não possui uma conta?
                    <a class="font-medium text-blue-600 hover:underline" href="../cadastroUsuario/cadastro-usuario.php">Crie uma aqui!</a>
                </p>
                <form class="mt-10 grid grid-cols-1 gap-y-8" action="../../controller/LoginController.php" method="POST">
                    <div>
                        <label for="emailLoginUsuario" class="mb-3 block text-sm font-medium text-gray-700">Email <span class="text-red-600">*</span></label>
                        <input id="emailLoginUsuario" type="email" autoComplete="email" required=""
                            class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:bg-white focus:outline-hidden focus:ring-orange-500 sm:text-sm"
                            name="emailLoginUsuario" />
                    </div>
                    <div>
                        <label for="senhaLoginUsuario" class="mb-3 block text-sm font-medium text-gray-700">Senha <span class="text-red-600">*</span></label>
                        <input id="senhaLoginUsuario" type="password" autoComplete="current-password" required=""
                            class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-orange-500 focus:bg-white focus:outline-hidden focus:ring-orange-500 sm:text-sm"
                            name="senhaLoginUsuario" />
                    </div>
                    <div>
                        <button
                            class="group inline-flex items-center justify-center rounded-full py-2 px-4 text-sm font-semibold focus:outline-hidden focus-visible:outline-2 focus-visible:outline-offset-2 cursor-pointer bg-orange-400 text-white hover:text-slate-100 hover:bg-orange-500 active:bg-orange-400 active:text-orange-100 focus-visible:outline-orange-400 w-full"
                            type="submit" variant="solid" color="blue" name="">
                            <span>Entrar <span aria-hidden="true">→</span></span>
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