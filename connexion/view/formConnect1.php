<?php
function formConnect(){
    $form = new Form($_POST);
    $form->surround = 'div';
?>

<form action="" method="post">
<?php
echo $form->label('mailUser', 'Adresse Mail');
echo $form->input('mailUser');
echo $form->label('pswUser', 'Mot de passe');
echo $form->input('pswUser','password');
echo $form->submit('Se connecter');

?>
</form>
<?php
}
?>