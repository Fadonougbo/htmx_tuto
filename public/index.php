<?php 

 require dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

 $uri=$_SERVER['PATH_INFO']??null;
 
 $path=match($uri) {
    null=>"/home",
    "/form"=>isset($_SERVER['HTTP_HX_REQUEST'])?$uri:'/404',
    "/user"=>$uri,
    default=>"/404"

 };

 $content=null;

 $base_path=dirname(__DIR__).DIRECTORY_SEPARATOR.'backend';
 
/*  if(!file_exists($base_path.$path.'.php')) {

    ob_start();
        require $base_path."/404".'.php';
    $content=ob_get_clean();

    require $base_path.DIRECTORY_SEPARATOR.'base.php';

    die();
 } */

 if(!empty($path)) {

    ob_start();
        require $base_path.$path.'.php';
    $content=ob_get_clean();

 }


 require $base_path.DIRECTORY_SEPARATOR.'base.php';

?>
