<?php
include("C:\\xampp\\htdocs\\workshop\\scr\\header.php");

$tweet=new Tweets();
$tweet->loadFromDatabase($conn,$_SESSION["tweet_id"]);


if(isset($_GET["tweet_id"]) == true){
	$tweetToShow=new Tweets();
	$tweetToShow->loadFromDataBase($conn,$_GET["tweet_id"]);

	$tweetToShow->showTweet();
}
else{
	echo($tweet->showTweet());

}
include("C:\\xampp\\htdocs\\workshop\\scr\\napiszKomentarz.php");

	$retArray = $comment->getAllTweetComments($conn, 40);
	foreach(array_reverse($retArray) as $comment) {
		echo "<br>";
		echo ($tweet->showComment());

	}
	
	

include("C:\\xampp\\htdocs\\workshop\\scr\\footer.php");
//plik nie potrzebny
?>