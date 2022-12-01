<?php

    if($id <= 0){
    //echo"<script>window.alert('Pagina invalida');history.bach()</script>";
        $id = 1;
    }

    $link = "https://api.themoviedb.org/3/movie/popular?api_key={$key}&language=pt-BR&page={$id}";

    $link = file_get_contents($link);
    $dados = json_decode($link);
    
    //print_r($dados);

?>
    <h1 class="text-center">Filmes Populares</h1>    

    <div class="row">
        <?php
        foreach($dados->results as $filme){
            ?>
            <div class="col-12 col-md-3">
                <div class="card text-center" style="height: 700px;">
                    <img src="<?=$pasta?><?=$filme->poster_path?>" alt="Poster do filme">
                    <h3><?=$filme->title?></h3>
                    <h4>Avaliação: <?=$filme->vote_count?></h4>
                    <h4>Popularidade: <?=$filme->popularity?></h4>
                    <p>
                        <a href="filme/<?=$filme->id?>" class="btn btn-warning">
                            Detalhes do filme
                        </a>
                    </p>
                </div>
            </div>
            <?php
        }
        echo"Total de Paginas: " . $pg = $dados->total_pages;

        if($id > $pg ){
            echo"<script>alert('Pagina inválida');history.back()</script>";
            exit;
        }
        ?>
    </div>
    <br>
    <a href="filmes/1" class="btn btn-warning">
        << Primeira página
    </a>
    <br>
    <br>
    <input type="number" name="pagina-filme" id="pagina-filme" class="form-control" placeholder="1 a <?=$pg?>" style="width: 100px" onblur="mudarPagina(this.value)">
    <br>
    <a href="filmes/<?=$pg?>" class="btn btn-warning">
        Ultima Página >>
    </a>
    <script>
    function mudarPagina(pagina){
        location.href = "filmes/"+pagina;
    }
</script>

   
