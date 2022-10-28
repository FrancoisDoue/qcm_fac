<?php
function formInscr1(){
    $form = new Form();
    $form->surround = 'div'    
?>
    <form action="/inscription/?inscr=confirm" method="post">
<?php
    echo $form->label('lastName', 'Nom');
    echo $form->input('lastName');
    echo $form->label('firstName','Prénom');
    echo $form->input('firstName');
    echo $form->label('mailUser','Adresse Mail');
    echo $form->input('mailUser','mail');
    echo $form->label('pswUser','Mot de passe');
    echo $form->input('pswUser','password');
    echo $form->submit('Continuer');
?>    
    </form>
<?php } ?>