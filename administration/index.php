<?php
/* --- ROUTES --- */
require "../routes/routes.php";
require "../routes/headPath.php";
getRequires();

/* --- */
$header = getHeader(modifyHeader());
$aside = asideAdm();
/* just for test */
$main = mainQuestion();
/* end of test */
if(ctrlSessionAdm()){
    if(empty($_GET)){
        header("Location: /administration/?maintool=cat");
    }else{
        if(isset($_GET['maintool'])){
            switch($_GET['maintool']){
                case 'question':

                    echo $_GET['maintool']; 
                    break;
                case 'questions':
                    
                    echo $_GET['maintool']; 
                    break;
                default:
                    header("Location: /administration/?maintool=question");
                    echo $_GET['maintool'];
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