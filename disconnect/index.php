<?php
/*--- ENTITIES ---*/
/* --- */
/*--- DATABASE ---*/

/* --- */
/*--- COMMON MODELS ---*/
require "../common/model/ctrlSession.php";
/* --- */
/*--- COMMON VIEWS ---*/

/* --- */
/*--- MODELS ---*/

/* --- */
/*--- VIEWS ---*/

/* --- */
/*--- CALL FUNCTIONS ---*/
if(isset($_SESSION)){
    session_destroy();
}
header('Location: /');