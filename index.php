<?php
/* ENTITIES */
require "entities/adminClass.php";
require "entities/userClass.php";
require "entities/messagesClass.php";
require "entities/formClass.php";
require "entities/envParser.php";
/* --- */
/* DATABASE */
require "common/model/ctrlSession.php";
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