<?php
/* --- ROUTES --- */
require "../routes/routes.php";
getRequires();
/* --- */
$header = getHeader();
if(ctrlSessionAdm()){

}else{
    session_destroy();
    header('Location: /login/?error=session');
}
echo 'page admin';
$footer = getFooter();