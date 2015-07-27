<?php

header('Content-type: text/html;charset=utf-8');
require_once("C:\\xampp\\htdocs\\workshop\\scr\\user.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"]==="POST"){
	var_dump($_POST);
	echo("<br>");
	$newUser=new User();
	$newUser->register($conn,$_POST["name"],$_POST["desc"],$_POST["password"],$_POST["password_2"]);
	
	
	if( $newUser->getId()!=-1){
		$_SESSION["user_id"]=$newUser->getId();
		header("Location: http://localhost/workshop/scr/");
		die();
		
	}
	else{
		echo("Error during register...<br>");
	}
	
}
	

?>


<form method="post"action"#">
<label>Nazwa Uzytkownika:</label>
<input name="name" type="text" maxlenght="255" value=""/><br>
<p></p>
<label>Description</label>
<input name="desc" type="text" maxlenght="255" value=""/><br>
<p></p>
<label> Haslo:</label>
<input name="password" type="text" maxlenght="255" value=""/><br>
<p></p>
<label>Powtorz haslo :</label>
<input name="password_2" type="text" maxlenght="255" value=""/><br>
<p></p>
<button type="submit">Zarejestruj sie</button>
</form>
