<?php
/* --- ROUTES --- */
require "../routes/routes.php";
require "../routes/headPath.php";
getRequires();

/* --- */
$header = getHeader(modifyHeader());
$aside = asideAdm();
if(ctrlSessionAdm()){
    if(empty($_GET)){
        header("Location: /administration/?maintool=question");
    }else{
        if(isset($_GET['maintool'])){
            switch($_GET['maintool']){
                case 'question':
                    mainQuestion($_GET['maintool']);
                    break;
                case 'qcm':
                    mainQuestion($_GET['maintool']);
                    break;
                case 'groupe':
                    mainQuestion($_GET['maintool']);
                    break;
                case 'epreuve':
                    mainQuestion($_GET['maintool']);
                    break;
                case 'resultat':
                    mainQuestion($_GET['maintool']);
                    break;
                default:
                    header("Location: /administration/?maintool=question");
                    break;
            }
        }else{
            header("Location: /administration/?maintool=question");
        }
    }
}else{
    session_destroy();
    header('Location: /login/?error=session');
}
$footer = getFooter();