<?php
include("C:\\xampp\\htdocs\\workshop\\scr\\header.php");

$loggedUser=new User();
$loggedUser->loadFromDatabase($conn,$_SESSION["user_id"]);

if($_SERVER["REQUEST_METHOD"]==="POST"){
	$loggedUser->saveToDatabase($conn,$_POST["desc"],$_POST["password"],$_POST["password_2"]);
}

echo('
<form method="post"action"#">
<label>Description</label>
<input name="desc" type="text" maxlenght="255" value=""/><br>
<p></p>
<label> Haslo:</label>
<input name="password" type="text" maxlenght="255" value=""/><br>
<p></p>
<label>Powtorz haslo :</label>
<input name="password_2" type="text" maxlenght="255" value=""/><br>
<p></p>
<button type="submit">Zaakceptuj zmiany</button>
</form>
');

include("C:\\xampp\\htdocs\\workshop\\scr\\footer.php");

?>