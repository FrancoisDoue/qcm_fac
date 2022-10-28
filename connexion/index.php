<?php
require "../routes/routes.php";
getRequires();

var_dump($_POST);
$header = getHeader();
$form = formConnect();
$footer = getFooter();