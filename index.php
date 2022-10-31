<?php
/* ENTITIES */
require "entities/adminClass.php";
require "entities/userClass.php";
require "entities/messagesClass.php";
require "entities/formClass.php";
/* --- */
/* DATABASE */
require "common/model/ctrlSession.php";
require "database/envParser.php";
require "database/requestDb.php";
require "database/connectDb.php";
/* --- */
/* COMMON MODELS */

/* --- */
/* COMMON VIEWS */
require "common/view/header.php";
require "common/view/footer.php";
/* --- */
/* MODELS */

/* --- */
/* VIEWS */
require 'accueil/view/accueilView.php';
/* --- */
/* CALL FUNCTIONS */
// use env;

$header = getHeader(modifyHeader());
$tempAccuil = testAccueil();
$footer = getFooter();