<?php
/* --- ROUTES --- */
require "../routes/routes.php";
getRequires();
/* --- */
$header = getHeader();
$form = getForm();
if(connexionAdm()){
    header("Location: /administration/");
}
$footer = getFooter();