<?php
include("C:\\xampp\\htdocs\\workshop\\scr\\header.php");

$loggedUser=new User();
$loggedUser->loadFromDatabase($conn,$_SESSION["user_id"]);

include("C:\\xampp\\htdocs\\workshop\\scr\\napiszWiadomosc.php");


$retArray = $loggedUser->getAllMessages($conn, 40);

foreach(array_reverse($retArray) as $message) {
    echo "<br>";
    echo ($message->showMessage());
	

}


include("C:\\xampp\\htdocs\\workshop\\scr\\footer.php");
?>