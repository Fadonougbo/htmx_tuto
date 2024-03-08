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
  $n='';

  if( isset($_GET['orderyBy']) && !empty($_GET['orderyBy'])) {

     $orderBy=$_GET['orderyBy'];

     [$field,$state]=explode('.',$orderBy);


    $sqlStatment.=" order By {$field} {$state} ";

    $s=$state==='DESC'?'ASC':'DESC';
    $n=$field;

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

            <tr hx-target='table' hx-include="input" hx-select='table' hx-swap='outerHTML'>

                <th hx-get="/form?orderyBy=article.<?= $s?>">
                  article 
                  <?php if(!empty($s)&&($n==='article')):  ?>
                    <?= $s==='DESC'?'&blacktriangledown;':'&blacktriangle;' ?> 
                  <?php endif; ?>

                </th>
                <th hx-get="/form?orderyBy=categorie.<?= $s?>" >
                  categorie
                  <?php if(!empty($s)&&($n==='categorie')):  ?>
                    <?= $s==='DESC'?'&blacktriangledown;':'&blacktriangle;' ?> 
                  <?php endif; ?>
                </th>
                <th hx-get="/form?orderyBy=quantite.<?= $s?>" >
                  quantity
                  <?php if(!empty($s)&&($n==='quantite')):  ?>
                    <?= $s==='DESC'?'&blacktriangledown;':'&blacktriangle;' ?> 
                  <?php endif; ?>
                </th>
                <th>
                  status
                </th>

            </tr>

        </thead>

       <tbody>
            <?php if(!empty($articles)): ?>

              <?php foreach($articles as $article): ?>
                  <tr>
                      <td><?=$article->article; ?></td>
                      <td><?=$article->categorie ?></td>
                      <td><?= $article->quantite ?></td>
                      <td><?= (int)$article->status===1?'online':'offline' ?></td>
                  </tr>
              <?php endforeach;?>

            <?php else: ?>

                <tr id='no_match_row' >
                  <td colspan="4" >No Match</td>
                </tr>

            <?php endif; ?>
       </tbody>

  </table>


