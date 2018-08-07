<?php
session_start();
$login=$password="";
$login    = fixString($_POST['login']);
$password = fixString($_POST['password']);
/**************************Очистка переменных******************/
function fixString($var){
	 $var = strip_tags($var);
	 $var = stripslashes($var);
	 $var = htmlentities($var);
	 return $var;
}
/*************************Проверка наличия логина***************/
function checkLogin($string){
	if ($string == ""){
		return "Enter your login";
	}else{
		return "";
	}
}
/****************************Проверка наличия пароля****************/
function checkPassword($string){
	if ($string == ""){
		return "Enter your password";
	}else{
		return "";
	}
}

$errors  = checkLogin($login);
$errors .= checkPassword($password);
/***************************Проверка пароля и логина на соответствие или вывод ошибок***********/
if ($errors == ""){
	if (file_exists('../users/'.$login.'.xml')) {
		$xml = new SimpleXMLElement('../users/'.$login.'.xml',0,true);
		$salt="$2fsdw112rgaijrq";
		$password = md5($password.$salt);
		if ($password == $xml->password){
			$_SESSION['login'] = $login;
			$info = array('info1' =>"Hello " . $_SESSION['login'],
										'info2' =>"<a href='/'>Main page</a>");
			echo json_encode($info);
		}else{
			$info = array('info3' => "Password is incorrect");
			echo json_encode($info);
		}
	}else{
		$info = array('info4' => "Login is incorrect",);
		echo json_encode($info);

	}
}else{
	$info =  array("info5" => checkLogin($login),
                 "info6" => checkPassword($password));
	echo json_encode($info);
}