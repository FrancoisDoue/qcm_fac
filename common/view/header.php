<?php
function getHeader($verif = false){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if(function_exists('headPath')){
        headPath('.');
    }
    ?>
    <link rel="stylesheet" href="/common/style/main.css" >

    <title>Document</title>
</head>
<body>
    <div id="container">
        <div id="fullHeader">
            <header>

            </header>
            <div id="account">
                <?php 
                    if($verif){
                        echo '<a href="/disconnect/"><button type="button">Déconnexion</button></a>';
                    }else{
                        echo   '<a href="/connexion/"><button type="button">Connexion</button></a>
                                <a href="/inscription/"><button type="button">Inscription</button></a>';
                    }
                ?>
            </div>
        </div>
        <div id="fullMain">
<?php } ?>