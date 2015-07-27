<?php

header('Content-type: text/html;charset=utf-8');
require_once("C:\\xampp\\htdocs\\workshop\\scr\\tweety.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\user.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\connect.php");



$loggedUser=new User();
$loggedUser->loadFromDatabase($conn,$_SESSION["user_id"]);


if ($_SERVER["REQUEST_METHOD"]==="POST"){
	var_dump($_POST);
	echo("<br>");
	$newTweet=new Tweets();
	$newTweet->create($conn,$_POST["text"], $loggedUser->getId());
	
	
	if( $newTweet->getId()!=-1){
		$_SESSION["tweet_id"]=$newTweet->getId();
		header("Location: http://localhost/workshop/scr/");
		die();
		
	}
	else{
		echo("Error during register...<br>");
	}
	
}
?>


<form method="post"action"#" >

<fieldset>
<label>Napisz Tweeta:</label>
<input name="text" type="text" maxlenght="140" value=""/><br>
<p></p>
<button type="submit">Wyslij</button>
</fieldset>

</form>


