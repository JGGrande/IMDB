<h1 class="text-center">
    Últimos Filmes
</h1>
<div class="row">
<?php
    
    $link = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key={$key}&language=pt-BR&page=1");
    
    $dados = json_decode($link);

    //print_r ( $dados );
    foreach ( $dados->results as $filme ) {

        //echo $filme->title."<br>";
        ?>
        <div class="col-12 col-md-3">
            <div class="card text-center">
                <img src="<?=$pasta?><?=$filme->poster_path?>"
                alt="<?=$filme->title?>" class="w-100">
                <p class="titulo"><?=$filme->title?></p>
                <p>
                    <a href="filme/<?=$filme->id?>" class="btn btn-warning">
                        Detalhes do Filme
                    </a>
                </p>
            </div>
        </div>
        <?php

    }
?>
</div>