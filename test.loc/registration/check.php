<?php
session_start();
$login=$password=$confirm_password=$email=$name="";
$login            = fixString($_POST['login']);
$password         = fixString($_POST['password']);
$confirm_password = fixString($_POST['confirm_password']);
$email            = fixString($_POST['email']);
$name             = fixString($_POST['name']);
/**************************Очистка переменных******************/
function fixString($var){
	$var = strip_tags($var);
	$var = stripslashes($var);
	$var = htmlentities($var);
	return $var;
}
/************************************Функция проверки логина******************/
function checkLogin($string){
  if($string == ""){	
		return "Enter your login";
	}else{
		return "";
	}
}
/**************************************Функция проверки уникальности логина**************/
function checkUniqueLogin($string){
	if (file_exists('../users/'.$string.'.xml')){
		return "Login already in use";
	}else{
		return "";
	}
}
/*****************************************Проверка наличия пароля и соостветствия второму паролю*****/
function checkPassword($string_1,$string_2){
 if ($string_1 == ""){
 	return "Enter your password";
 }else if($string_1!=$string_2){
 	return "Passwords dont match";
 }else{
 	return "";
 }
}
/****************************Проверка наличия второго пороля******************/
function checkConfPassword($string){
	if ($string == ""){
		return "Enter duplicate password";
	}else{
		return "";
	}
}
/****************************Проверка наличия Email************************/
function checkEmail($string){
	if ($string == ""){
		return "Enter your email";
	}else{
		return "";
	}
}
/*********************************Проверка наличия имени***********************/
function checkName($string){
	if ($string == ""){
		return "Enter your name";
	}else{
		return "";
	}
}
/******************Запись ошибок в переменную*********************/
$errors  = checkLogin($login);
$errors .= checkUniqueLogin($login);
$errors .= checkPassword($password,$confirm_password);
$errors .= checkConfPassword($confirm_password);
$errors .= checkEmail($email);
$errors .= checkName($name);
/*********************************Запись данных в БД или вывод ошибок***************/
if ($errors == ""){
	$salt="$2fsdw112rgaijrq";
	$xml = new SimpleXMLElement('<user></user>');
	$xml -> addChild('login', $login);
	$xml -> addChild('password', md5($password.$salt));
	$xml -> addChild('email', $email);
	$xml -> addChild('name', $name);
	$xml -> asXML('../users/'.$login.'.xml');
	$info = array('info1' => "You are registred",
								'info2' => "<a href='/singin/login.php'>Sing in</a>");
	echo json_encode($info);
}else{
	$info = array('info3' => checkLogin($login),
								'info4' => checkUniqueLogin($login),
		            'info5' => checkPassword($password,$confirm_password),
		            'info6' => checkConfPassword($confirm_password),
		            'info7' => checkEmail($email),
		            'info8' => checkName($name));
	echo json_encode($info);
}

  
