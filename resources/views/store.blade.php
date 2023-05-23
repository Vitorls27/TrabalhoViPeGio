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
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper">Come On In</span>
                                <span class="section-heading-lower">We're Open</span>
                            </h2>
                            <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Sunday
                                    <span class="ms-auto">Closed</span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Monday
                                    <span class="ms-auto">7:00 AM to 8:00 PM</span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Tuesday
                                    <span class="ms-auto">7:00 AM to 8:00 PM</span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Wednesday
                                    <span class="ms-auto">7:00 AM to 8:00 PM</span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Thursday
                                    <span class="ms-auto">7:00 AM to 8:00 PM</span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Friday
                                    <span class="ms-auto">7:00 AM to 8:00 PM</span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Saturday
                                    <span class="ms-auto">9:00 AM to 5:00 PM</span>
                                </li>
                            </ul>
                            <p class="address mb-5">
                                <em>
                                    <strong>1116 Orchard Street</strong>
                                    <br />
                                    Golden Valley, Minnesota
                                </em>
                            </p>
                            <p class="mb-0">
                                <small><em>Call Anytime</em></small>
                                <br />
                                (317) 585-8468
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Equipe &copy; Giordano Parisotto | Pedro Henrique Prola | Vitor de Souza</div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
