<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDB</title>

    <base href="http://localhost/imdb/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
        <img src="imagens/logo.png" alt="IMDB">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="index.php">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filmes">
            Filmes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="atores">
            Atores
          </a>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>  

<main class="container">
    <?php
        include "config.php";
        //print_r ( $_GET );
        $pagina = $_GET["param"] ?? "home";

        //se estiver vindo parametro
        if ( isset( $_GET["param"] ) ) {
          //recuperar o parametro
          $param = $_GET["param"];
          //quebrara a string do parametro por /
          $param = explode("/", $param);

          //print_r( $param );
          $pagina = $param[0];
          $id = $param[1] ?? NULL;

        }

        //home -> paginas/home.php
        $pagina = "paginas/{$pagina}.php";

        if ( file_exists($pagina) ) {
            include $pagina;
        } else {
            include "paginas/erro.php";
        }
    ?>
</main>
<footer class="bg-light">
    <p class="text-center">
        Desenvolvido por João G. Grande
    </p>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>