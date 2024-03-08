<?php 


use App\DB;

$pdo=DB::connection();

if(!empty($_GET)) {

  $_GET['status']=isset($_GET['status'])?1:0;


  $sqlStatment="SELECT * FROM dataTable ";
  $data=[];

  if( isset($_GET['article']) && !empty($_GET['article'])) {

    $sqlStatment.=empty($data)?" WHERE  article LIKE(:article) ":" &&  article LIKE(:article) " ;

    $article=$_GET['article'];

    $data['article']="%{$article}%";

  }

  if( isset($_GET['categorie']) && !empty($_GET['categorie'])) {


    $sqlStatment.=empty($data)?" WHERE categorie LIKE(:categorie) ": " && categorie LIKE(:categorie) ";

    $categorie=$_GET['categorie'];

    $data['categorie']="%{$categorie}%";

  }

  if( isset($_GET['min_qte']) && !empty($_GET['min_qte'])) {


    $sqlStatment.=empty($data)?" WHERE quantite >=:minQte ": " && quantite >=:minQte ";

    $minQte=(int)$_GET['min_qte'];

    $data['minQte']=$minQte;

  }

  if( isset($_GET['max_qte']) && !empty($_GET['max_qte'])) {

    $sqlStatment.=empty($data)?" WHERE quantite <=:maxQte ": " && quantite <=:maxQte ";

    $maxQte=(int)$_GET['max_qte'];

    $data['maxQte']=$maxQte;

  }

  if( isset($_GET['status']) && !empty($_GET['status'])) {

    $sqlStatment.=empty($data)?" WHERE status=:status ": " && status=:status ";

    $status=(int)$_GET['status'];

    $data['status']=$status;

  }

  $s='';

  if( isset($_GET['orderyBy']) && !empty($_GET['orderyBy'])) {

     $orderBy=$_GET['orderyBy'];

     [$field,$state]=explode('.',$orderBy);


    $sqlStatment.=" order By {$field} {$state} ";

    $s=$state==='DESC'?'ASC':'DESC';

  }



  try{

    $req=$pdo->prepare($sqlStatment);

    $req->execute($data);

    $articles=$req->fetchAll();

  }catch(PDOException $e) {

      echo $e->getMessage();
  } 

}

?>
  
  <table>
        <thead>
            <tr>
                <th

                       hx-get="/form?orderyBy=article.<?= $s?>"
                       hx-target='table' 
                       hx-include="input"
                       hx-select='table'
                       hx-swap='outerHTML'
                >
                  article
                </th>
                <th
                       hx-get="/form?orderyBy=categorie.<?= $s?>"
                       hx-target='table' 
                       hx-include="input"
                       hx-select='table'
                       hx-swap='outerHTML'
                >
                  categorie
                </th>
                <th
                       hx-get="/form?orderyBy=quantite.<?= $s?>"
                       hx-target='table' 
                       hx-include="input"
                       hx-select='table'
                       hx-swap='outerHTML'
                >
                  quantité
                </th>
                <th
                >
                  status
                </th>
            </tr>
        </thead>
       <tbody>
            <tr>
              <td><?=$sqlStatment;dump($data);dump($_GET,$s) ?></td>
            </tr>
       <?php foreach($articles as $article): ?>
            <tr>
              <td><?=$sqlStatment; ?></td>
                <td><?=$article->article; ?></td>
                <td><?=$article->categorie ?></td>
                <td><?= $article->quantite ?></td>
                <td><?= (int)$article->status===1?'online':'offline' ?></td>
            </tr>
        <?php endforeach;?>
       </tbody>
    </table>


