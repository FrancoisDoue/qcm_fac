<?php
require "../routes/routes.php";
getRequires();

$header = getHeader();

if(tryConnexionUser()){
    // var_dump('on est sur la bonne voie');
    $end = viewEndConnect();
    header('Refresh:3; url=/');
}else{
    $form = formConnect();
}
$footer = getFooter();