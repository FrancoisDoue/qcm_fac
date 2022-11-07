<?php
function reqAdm():string{
    $req = "SELECT `login_admin`,`psw_admin`
			FROM `administration`
			WHERE `login_admin` = '%s';";
    return $req;
}
function reqInsUser():string{
    $req = "INSERT INTO `user` (`last_name`,`first_name`,`mail_user`,`psw_user`)
	    	VALUES ('%s', '%s', '%s', '%s')";
    return $req;
}
function reqSearchUser():string{
    $req = "SELECT `id_user`
			FROM `user`
			WHERE `mail_user` = '%s'";
    return $req;
}
function reqGetUser():string{
    $req = "SELECT `id_user`,`last_name`,`first_name`,`mail_user`,`psw_user`
			FROM `user`
			WHERE `mail_user` = '%s';";
    return $req;
}
function reqAddQuestion():array{
	$req1 = "INSERT INTO `question`(`statements`,`statements_bis`)
			VALUES ('%s','%s');";

	$req2 = "SELECT `id_question` 
			FROM `question`
			WHERE `statements` = '%s' 
			ORDER BY `id_question` DESC 
			LIMIT 1;"; 

	$req3 = "INSERT INTO `answer` (`answer_text`,`true_answer`,`id_question`)
			VALUES ('%s', %d, %d);";

	$req4 = "INSERT INTO `cat_question` (`id_question`,`id_cat`)
			VALUES (%d, %d);";
   	return array(
		'ADD_QUESTION' 	=> $req1, 
		'GET_ID' 		=> $req2, 
		'ADD_ANSWER' 	=> $req3, 
		'SET_CAT' 		=> $req4 
	);
}
function reqCategorie(string $option, $where = 1):string{
	$opt = array(
		'ID_CAT'	=> "WHERE `id_cat` = %d ;",
		'LIB_CAT'	=> "WHERE `lib_cat` = '%s' ;",
		'ID_S_CAT'	=> "WHERE `id_supercat` = %d ;",
		'LIB_S_CAT'	=> "WHERE `lib_supercat` = '%s' ;",
		'ID_QUEST'	=> "NATURAL JOIN `cat_question`
						WHERE `id_question` = %d",
		'ALL_S_CAT' => "SELECT `id_supercat`, `lib_supercat`
						FROM `supercat`"
	);
	if($option !== 'ALL_S_CAT'){
		$req = sprintf(
			"SELECT `id_cat`, `lib_cat`, `id_supercat`, `lib_supercat`
			FROM `categorie`
			NATURAL JOIN `supercat`
			%s", sprintf($opt[$option],$where
			)
		);
	}else{
		$req = $opt['ALL_S_CAT'];
	}
	return $req;
}
function reqQuestionByCat(int $int){
	$req = sprintf("SELECT `id_question`, `statements`, `statements_bis`, `difficult`, `lesson_ref`
			FROM `question`
			NATURAL JOIN `cat_question`
			WHERE id_cat = %d",$int);
	return $req;
}