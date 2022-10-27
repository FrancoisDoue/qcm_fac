<?php
require "../routes/routes.php";
getRequires();
$header = getHeader();
if(!empty($_GET) && isset($_GET['inscr'])){
    switch($_GET['inscr']){
        case 'start' :
            $form = formInscr1();
            break;
        case 'confirm':
            if(inscriptionUser()){
                $form = formInscr2();
            }else{
                unset($_POST);
                header('Location: /inscription/?inscr=start');
            }
            break;
        case 'end':

            break;
        default:
            header('Location: /inscription/?inscr=start');
            break;
    }
}else{
    header('Location: /inscription/?inscr=start');
}

// $test = inscriptionUser();
$footer = getFooter();