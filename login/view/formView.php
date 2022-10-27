<?php
function getForm(){
$tempForm = new Form($_POST);
?>
<form action="" method="post">
<?php
$tempForm->surround = 'div';
echo $tempForm->input('login_admin');
echo $tempForm->input('psw_admin','password');
echo $tempForm->submit('Se connecter');
?>
</form>
<?php } ?>