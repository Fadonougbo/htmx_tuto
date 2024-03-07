<?php

use App\DB;

$pdo=DB::connection();

/* 
try{

    $req=$pdo->query('SELECT * FROM users LIMIT 20');

    $articles=$req->fetchAll();

}catch(PDOException $e) {

    echo $e->getMessage();
} */

?>


<main>

    <div id='form_container' >
        <form action="" method="GET">
            <section >
                <input type="search" 
                       name="article"  
                       placeholder="Article name" 
                       hx-get='/form'  
                       hx-trigger='keyup,change throttle:500ms' 
                       hx-target='#debug' 
                       hx-include="input"
                >

                <input type="search" 
                       name="categorie" 
                       placeholder="Categorie name" 
                       hx-get='/form'  
                       hx-trigger='keyup,change throttle:500ms' 
                       hx-target='#debug'
                       hx-include="input"
                >


                <input type="number" 
                       name="min_qte" 
                       placeholder="Min quantity" 
                       hx-get='/form'  
                       hx-trigger='keyup,change delay:100ms' 
                       hx-target='#debug'
                       hx-include="input"
                >

                <input type="number" 
                       name="max_qte" 
                       placeholder="Max quantity" 
                       hx-get='/form'  
                       hx-trigger='keyup,change delay:100ms' 
                       hx-target='#debug'
                       hx-include="input"
                >

                <label for="checkbox" >
                  online? <input type="checkbox" 
                                 id="checkbox" 
                                 name="status" 
                                 value="1" 
                                 hx-get='/form'  
                                 hx-trigger='change delay:100ms' 
                                 hx-target='#debug'
                                 hx-include="input"
                >
                </label>
            </section>
            
        </form>
    </div>
    <div id='debug' ></div>
    <table>
        <thead>
            <tr>
                <th>article</th>
                <th>categorie</th>
                <th>quantité</th>
                <th>status</th>
            </tr>
        </thead>
       <tbody>
        <tr>
            <td>doe</td>
            <td>sport</td>
            <td>6</td>
            <td>online</td>
        </tr>
        <tr>
            <td>doe</td>
            <td>sport</td>
            <td>6</td>
            <td>online</td>
        </tr>
        <tr>
            <td>doe</td>
            <td>sport</td>
            <td>6</td>
            <td>online</td>
        </tr>
       </tbody>
    </table>
    
    <!-- <header>
        <h1>Mes articles</h1>
    </header>
    <div id='container'>
        <button 
            hx-get='/form' 
            hx-trigger='click'
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
    </div>     -->
</main>