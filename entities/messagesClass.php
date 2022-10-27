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
}