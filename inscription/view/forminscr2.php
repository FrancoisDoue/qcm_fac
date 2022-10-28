<?php
function formInscr2(){
    $form = new Form();
    $form->surround = 'div'    
?>
    <form action="/inscription/?inscr=end" method="post">
<?php
    echo $form->label('pswUser','Confirmer le mot de passe');
    echo $form->input('pswUser','password');
    echo $form->submit('S\'inscrire')
?>    
    </form>
<?php } ?>