<?php
/* ENTITIES */
require "entities/adminClass.php";
require "entities/formClass.php";
/* --- */
/* DATABASE */
require "database/requestDb.php";
require "database/connectDb.php";
/* --- */
/* COMMON MODELS */
require "common/model/ctrlSession.php";

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
$header = getHeader();
$tempAccuil = testAccueil();
$footer = getFooter();