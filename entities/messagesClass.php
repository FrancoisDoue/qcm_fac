
<?php
class ErrorMessage{
    public static function inscrMail(){
        echo '<h2 class="error">Cette adresse mail est déjà utilisée<h2>';
        return false;
    }
    public static function errorPost(){
        echo '<h2 class="error">Veuillez remplir ce formulaire</h2>';
        return false;
    }    
    public static function errorMail(){
        echo '<h2 class="error">Cet utilisateur n\'existe pas. <a href="/inscription/">Inscrivez vous</a>.<h2>';
        return false;
    }
    public static function errorConnect(){
        echo '<h2 class="error">Mot de passe incorrect</h2>';
        return false;
    }
    public static function errorField(){
        echo '<h2 class="error">Ces champs sont obligatoires</h2>';
        return false;
    }
    public static function endOfSession(){
        echo    '<h2 class="error">Erreur de session, veuillez vous reconnecter</h2>
                <h4 class="error">Si l\'erreur persiste, veuillez contacter votre administrateur</h4>';
        return false;
    }
}