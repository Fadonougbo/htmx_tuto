<?php

use App\DB;

$pdo=DB::connection();

$req=$pdo->prepare('SELECT * FROM users LIMIT 20');

$req->execute();

$articles=$req->fetchAll();

?>


<main>
    <header>
        <h1>Mes articles</h1>
    </header>
    <div id='button_container' hx-target='this' >
        <button hx-get='/form' >Ajouter un article <strong>&plus;</strong></button>
    </div>
    <div id='cards' >
        <?php foreach($articles as $article): ?>
            <section class="card" >
                <div></div>
                <h2><span></span> <?=  $article->name ?></h2>
                <p><?=  $article->description ?></p>
            </section>
        <?php endforeach;?>
    </div>
    
</main>