<?php
/* --- ROUTES --- */
require "../routes/routes.php";
getRequires();
/* --- */
$header = getHeader();
if(isset($_GET['error'])){
    if($_GET['error'] == 'session'){
        ErrorMessage::endOfSession();
    }
}
$form = getForm();
if(connexionAdm()){
    header("Location: /administration/");
}
$footer = getFooter();