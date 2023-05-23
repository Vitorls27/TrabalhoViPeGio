<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Casual - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">CAFETERIA VIP CHAPECÓ</span>
                <span class="site-heading-lower">O VERDADEIRO CAFÉ</span>
            </h1>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-lg text-gray-400 dark:text-gray-400">Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg text-gray-400 dark:text-gray-400">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-lg text-gray-400 dark:text-gray-400">Cadastrar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Cafeteria VipeGio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="./">Início </a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about">Sobre Nós</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products">Produtos</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store">Cardápio</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{asset('img/about.jpg')}}" alt="..." />
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">como começamos</span>
                                    <span class="section-heading-lower">e onde chegamos</span>
                                </h2>
                                <p>A sua cafeteria preferida inicou em 2008 com pequenas criações de cafés voltados do curso de Gastronomia da Universidade Federal da Bahia (UFBA). O que era um simples projeto de extensão e pesquisa, acabou se tornando uma das melhores franquias de café do estado de Santa Catarina.

                                    Cada detalhe foi cuidadosamente planejado para proporcionar uma experiência única. Nossos grãos de café são selecionados das melhores fazendas do mundo, com atenção especial aos métodos sustentáveis ​​e ao comércio justo. Cada xícara que servimos é uma história. Então nos preparamos para servir cafés doces, leves, longos, curtos, cariocas, paulistas, mineiros, doces, amargos, fortes e picantes também. Afinal, cada história tem um sabor diferente.
                                    Seja bem vindo!

                                </p>
                                <p class="mb-0">
                                    Não deixe de
                                    <em>provar</em>
nosso café à moda da casa!                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Equipe &copy; Giordano Parisotto | Pedro Henrique Prola | Vitor de Souza  </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
