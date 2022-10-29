<?php
require "../routes/routes.php";
getRequires();

$header = getHeader();

if(tryConnexionUser()){
    var_dump('on est sur la bonne voie');
}else{
    $form = formConnect();
    // tryConnexionUser();
}
$footer = getFooter();