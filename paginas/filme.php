<?php

    $link = "https://api.themoviedb.org/3/movie/{$id}?api_key={$key}&language=pt-BR";

    //echo $link;

    //recuperar os valores (json) do link
    $link = file_get_contents($link);
    //decodificar os valores do json para objeto
    $dados = json_decode($link);

?>
<div class="card">
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="<?=$pasta?><?=$dados->poster_path?>"
            alt="<?=$dados->title?>" class="w-100">
        </div>
        <div class="col-12 col-md-9">
            <h1><?=$dados->title?></h1>
            
            <p><?=$dados->overview?></p>

            <p>Média: <?=$dados->vote_average?></p>
        </div>
    </div>
</div>

<h2 class="text-center">Atores deste filme:</h2>
<div class="row">
    <?php
        //link para buscar os atores do filme - get credits
        $link = "https://api.themoviedb.org/3/movie/{$id}/credits?api_key={$key}&language=pt-BR";

        //echo $link;

        $link = file_get_contents($link);

        $dados = json_decode($link);

        foreach ( $dados->cast as $ator ) {
            ?>
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="<?=$pasta?><?=$ator->profile_path?>"
                    alt="<?=$ator->name?>" class="w-100">
                    <p class="text-center">
                        <?=$ator->name?>
                    </p>
                    <p class="text-center">
                        <i><?=$ator->character?></i>
                    </p>
                    <p class="text-center">
                        <a href="ator/<?=$ator->id?>" class="btn btn-warning">
                            Detalhes do Ator
                        </a>
                    </p>
                </div>
            </div>
            <?php
        }
    ?>
</div>
