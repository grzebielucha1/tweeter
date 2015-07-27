<?php

header('Content-type: text/html;charset=utf-8');
require_once("C:\\xampp\\htdocs\\workshop\\scr\\wiadomosci.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\user.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\connect.php");


$loggedUser=new User();
$loggedUser->loadFromDatabase($conn,$_SESSION["user_id"]);


if ($_SERVER["REQUEST_METHOD"]==="POST"){
	var_dump($_POST);
	echo("<br>");
	$newMessage=new Message();
	$newMessage->create($conn,$_POST["text"], $loggedUser->getId());
	
	
	if( $newMessage->getId()!=-1){
		$_SESSION["message_id"]=$newMessage->getId();
		header("Location: http://localhost/workshop/scr/");
		die();
		
	}
	else{
		echo("Error during register...<br>");
	}
	
}
?>

<br>
<br>
<form method="post"action"#">
<label>Wybierz uzytkownika</label>
<select name="uzytkownicy">
<?php 
		$sqlUser="SELECT * FROM Users "; 
		$result = $conn->query($sqlUser);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo ("(<option value=  '".$row['nick']."'>".$row['nick']."</option value>)");
						}
				}
		?>

</select>
<p></p>
<label>Wyslij Wiadomosc Prywatna:</label>
<input name="text" type="text" maxlenght="255" value=""/><br>
<p></p>
<button type="submit">Wyslij</button>

</form>
