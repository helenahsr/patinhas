<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/img/Favicon.svg" type="image/x-icon">
    <!-- CDN Tailwind CSS -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- CDN de ícones do Remix Icons -->
    <link href=" https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css " rel="stylesheet">
    <title>Patinhas Felizes- Bem Vindo!</title>
</head>

<body class="flex items-center flex-col mt-4 ">
    <header
        class="w-4/6 sticky top-5 py-5 px-20 flex items-center justify-between rounded-xl shadow-xl ring-1 ring-black/5 glass">
        <div class="flex items-center">
            <a href="#" class="mr-10">
                <img src="../public/img/Logo.svg" alt="Logo Patinhas Felizes" class="w-70">
            </a>
            <ul class="mt-2 flex items-center">
                <li class="mr-4 hover:underline"><a href="#">Pets Perdidos</a></li>
                <li class="mr-4 hover:underline"><a href="#">Quem Somos</a></li>
                <li class="mr-4 hover:underline"><a href="#">Contato</a></li>
            </ul>
        </div>
        <ul class="flex items-center">
            <li class="mr-4 hover:underline"><a href="./login/login.php">Login</a></li>
            <li
                class="bg-orange-400 py-2 px-6 text-white rounded-xl hover:bg-orange-500 active:bg-orange-400 active:text-orange-100 focus-visible:outline-orange-400">
                <a href="./cadastroUsuario/cadastro-usuario.php">Cadastro</a>
            </li>
        </ul>
    </header>
    <main>
        <section class="mt-20">
            <h1
                class="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-black sm:text-7xl text-center">
                Conectando <span class="text-orange-400">corações</span> para reunir
                <span class="text-orange-400">
                    <span class="">patinhas</span>
                </span>
                perdidas.
            </h1>
            <p class="mx-auto mt-8 max-w-2xl text-lg tracking-tight text-black-700 text-center">
                Uma plataforma dedicada a reunir pets desaparecidos com seus tutores, conectando pessoas e espalhando esperança.
            </p>
        </section>
    </main>
</body>

</html>

<style>
    body {
        height: 200vh;
    }

    .glass {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
        border: solid 1px rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0 0.37);
        border-radius: 20px;
    }
</style>