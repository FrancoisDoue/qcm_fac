<?php
function prepareNewQuestion(array $session){
    if(isset($session['prepare']) && !empty($session['prepare'])){
        if(Question::newQuestion(ConnectDb::mysqliDb(),reqAddQuestion(),$session['prepare'])){
            unset($session['prepare']);
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}