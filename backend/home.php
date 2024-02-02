<?php

use App\DB;

$pdo=DB::connection();

$req=$pdo->query('SELECT * FROM users LIMIT 20');

$articles=$req->fetchAll();

?>


<main>
    <header>
        <h1>Mes articles</h1>
    </header>
    <div id='container' class=''>
        <button 
            hx-get='/form' 
            hx-swap='outerHTML' 
            hx-indicator="#loader" 
            id="show_form_button" 
            hx-headers='{"HShow": "true"}'  
            hx-disabled-elt="this" 
        >
                Ajouter un article <strong>&plus;</strong>
        </button>
        <button id='loader' class="htmx-indicator" >loading...</button>
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