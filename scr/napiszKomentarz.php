<?php

header('Content-type: text/html;charset=utf-8');
require_once("C:\\xampp\\htdocs\\workshop\\scr\\tweety.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\user.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\connect.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\comments.php");



$loggedTweet=new Tweets();
$loggedTweet->loadFromDataBase($conn,$_SESSION["user_id"]);


if ($_SERVER["REQUEST_METHOD"]==="POST"){
	var_dump($_POST);
	echo("<br>");
	$newComment=new Comments();
	$newComment->create($conn,$_POST["text"], $loggedTweet->getId());
	
	
	if( $newComment->getId()!=-1){
		$_SESSION["comment_id"]=$newComment->getId();
		header("Location: http://localhost/workshop/scr/");
		die();
		
	}
	else{
		echo("Error during register...<br>");
	}
	
}

?>


<form method="post"action"#">
<fieldset>
<label> Komentarz:</label>
<input name="text" type="text" maxlenght="140" value=""/><br>
<p></p>
<button type="submit">Dodaj</button>
</fieldset>
</form>


