<?php

use App\DB;

$pdo=DB::connection();

$faker = Faker\Factory::create();



try{

    $req=$pdo->query('SELECT * FROM dataTable');
    $articles=$req->fetchAll();

    /* for($i=1;$i<120;$i++) {

        $res=$pdo->prepare(" INSERT INTO dataTable  (article,categorie,quantite,status)  VALUES (:article,:categorie,:quantite,:status) ");

        $res->execute([
            'article'=>implode(' ',$faker->words(2)),
            'categorie'=>$faker->word(),
            'quantite'=>$faker->numberBetween(1,300),
            'status'=>$faker->numberBetween(0,1)
        ]);
        
    } */


}catch(PDOException $e) {

    echo $e->getMessage();
}

?>
<main>

    <div id='form_container' >
        <form action="" method="GET">
            
            <section hx-indicator="#loader" hx-swap='outerHTML' hx-select='table' hx-include="input" hx-include="input" hx-target='table'>

                <input type="search" 
                       name="article"  
                       placeholder="Article name" 
                       hx-get='/form'
                       hx-trigger='keyup,change throttle:500ms' 
                       
                >

                <input type="search" 
                       name="categorie" 
                       placeholder="Categorie name" 
                       hx-get='/form'  
                       hx-trigger='keyup,change throttle:500ms' 
                >


                <input type="number" 
                       name="min_qte" 
                       placeholder="Min quantity" 
                       hx-get='/form'  
                       hx-trigger='keyup,change delay:100ms' 
                       min="1"
                >

                <input type="number" 
                       name="max_qte" 
                       placeholder="Max quantity" 
                       hx-get='/form'  
                       hx-trigger='keyup,change delay:100ms'
                       min="1"
                >

                <label for="checkbox" >
                  online? <input type="checkbox" 
                                 id="checkbox" 
                                 name="status" 
                                 value="1" 
                                 hx-get='/form'  
                                 hx-trigger='change delay:100ms'
                                 
                >
                </label>
            </section>
            
        </form>
    </div>
 
    <table>
        <thead>
            <tr hx-target='table' hx-include="input" hx-select='table' hx-swap='outerHTML'>

                <th hx-get='/form?orderyBy=article.DESC' >
                    article
                </th>

                <th hx-get='/form?orderyBy=categorie.DESC' >
                    categorie
                </th>

                <th hx-get='/form?orderyBy=quantite.DESC' > 
                    quantity
                </th>

                <th>
                    status
                </th>
            </tr>
        </thead>
       <tbody>
       <?php foreach($articles as $article): ?>
            <tr>
                <td><?=$article->article ?></td>
                <td><?=$article->categorie ?></td>
                <td><?= $article->quantite ?></td>
                <td><?= (int)$article->status===1?'online':'offline' ?></td>
            </tr>
        <?php endforeach;?>
       </tbody>
    </table>
    
        <section id='loader' class="htmx-indicator" >
            loading...
        </section>
</main>