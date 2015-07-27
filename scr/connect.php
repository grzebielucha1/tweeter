<?php
$conn=new mysqli("localhost","root","","workshop");

if($conn->errno){
	echo("error connecting to database:<br>");
	echo($conn->error."<br>");
	die();
}