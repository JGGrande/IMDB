<?php

    $link = "https://api.themoviedb.org/3/person/{$id}?api_key={$key}&language=pt-BR";
    $link = file_get_contents($link);
    $dados = json_decode($link);

?>
<div class="card">
    <div class="row">
        <div class="col-12 col-md-3">
            <img src="<?=$pasta?><?=$dados->profile_path?>"
            alt="<?=$dados->name?>" class="w-100">
        </div>
        <div class="col-12 col-md-9">
            <h1><?=$dados->name?></h1>
            <p><?=$dados->biography?></p>
        </div>
    </div>
</div>