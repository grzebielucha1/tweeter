<?php
include("C:\\xampp\\htdocs\\workshop\\scr\\header.php");

	$loggedUser=new User();
	$loggedUser->loadFromDataBase($conn,$_SESSION["user_id"]);

	if(isset($_GET["user_id"]) == true){
		$userToShow=new User();
		$userToShow->loadFromDataBase($conn,$_GET["user_id"]);
		$userToShow->showUser();
	}
	else{
		$loggedUser->showUser();
	}

include("C:\\xampp\\htdocs\\workshop\\scr\\napiszTwitta.php");

	$retArray = $loggedUser->getAllMyPosts($conn, 40);
	foreach(array_reverse($retArray) as $tweet) {
		echo "<br>";
		echo ($tweet->showTweet());
	}
	
// w tej formie jak wejdziemy w innego uzytkownika na jego stronie wyswietlane sa jego posty plus posty zalogowanego uzytkownika 
//jak zakomantuje gore  strona  zalogowanego uzytkownika nie wyswietla zadnych jego postow reszta dziala ok
//jak zakomentuje dol kazda strona innych uzytkownikow wyswietla tylko posty zalogowanego uzytkownika

	$userToShow = new User();
	
	$userToShow->loadFromDataBase($conn,$_GET["user_id"]);
	$retArray = $userToShow->getAllMyPosts($conn, 40);

	foreach(array_reverse($retArray) as $tweet) {
		echo "<br>";
		echo ($tweet->showTweet());
}



include("C:\\xampp\\htdocs\\workshop\\scr\\footer.php");

?>