<?php

header('Content-type: text/html;charset=utf-8');
require_once("C:\\xampp\\htdocs\\workshop\\scr\\user.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\connect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"]==="POST"){
	
	echo("<br>");
	
	$newUser=new User();
	$newUser->login($conn,$_POST["name"],$_POST["password"])	;
	
	if($newUser->getId()!=-1){
		$_SESSION["user_id"]=$newUser->getId();
		header("Location: http://localhost/workshop/scr/");
		die();
		
	}
	else{
		echo("Blad podczas logowania<br>");
	}
	
}
?>


<form method="post"action"#">
<label>Nazwa Uzytkownika:</label>
<input name="name" type="text" maxlenght="255" value=""/><br>
<p></p>

<label> Haslo:</label>
<input name="password" type="text" maxlenght="255" value=""/><br>
<p></p>

<button type="submit">Zaloguj sie</button>
<p></p>

<button type="submit"><a href="http://localhost/workshop/scr/register.php">Zarejestruj sie</a></button>

	</p>
	</body>
	
</form>
