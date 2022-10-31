<?php
require "../routes/routes.php";
require "../routes/headPath.php";
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
                var_dump($_POST);
                header('Location: /inscription/?inscr=start');
            }
            break;
        case 'end':
            if(inscriptionUser(true)){
                echo 'inscription confirmée!';
                header('Refresh:3; url=/connexion/');
            }else{
                header('Location: /inscription/?inscr=start');
            }
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