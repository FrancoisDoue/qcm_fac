<?php
require "../routes/routes.php";
getRequires();
$header = getHeader();
// echo 'inscription user';
$form = formInscr();
inscriptionUser();
$footer = getFooter();