<?php
include("C:\\xampp\\htdocs\\workshop\\scr\\header.php");
$loggedUser=new User();
$loggedUser->loadFromDatabase($conn,$_SESSION["user_id"]);


echo("<br>Witaj<br>".$loggedUser->getName()."<br>");

include("C:\\xampp\\htdocs\\workshop\\scr\\napiszTwitta.php");


$retArray = $loggedUser->getAllPosts($conn, 40);
foreach(array_reverse($retArray) as $tweet) {
    echo "<br>";
    echo ($tweet->showTweet());
	

}





include("C:\\xampp\\htdocs\\workshop\\scr\\footer.php");


?>