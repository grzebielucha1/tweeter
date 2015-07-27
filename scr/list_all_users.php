<?php
include("C:\\xampp\\htdocs\\workshop\\scr\\header.php");

$loggedUser=new User();
$loggedUser->loadFromDatabase($conn,$_SESSION["user_id"]);

$sql = "SELECT id FROM Users";
$result=$conn->query($sql);


if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$tempUser=new User();
		$tempUser->loadFromDatabase($conn,$row["id"]);
		
		echo($tempUser->generateLinkToMyPage());
		echo("<br>");
	}
	
}




include("C:\\xampp\\htdocs\\workshop\\scr\\footer.php");