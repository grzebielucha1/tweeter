<?php

header('Content-type: text/html;charset=utf-8');
require_once("C:\\xampp\\htdocs\\workshop\\scr\\user.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\connect.php");

session_start();

if(isset($_SESSION["user_id"])===false){
	header("location:http://localhost/workshop/scr/login.php");
	die();
}
	

echo("
				<button>
				&nbsp; &nbsp; <a href='http://localhost/workshop/scr/index.php'>Strona Glowna</a> &nbsp; &nbsp;
				</button>
				<button>
			<a href='http://localhost/workshop/scr/show_user.php'>Moje konto</a> &nbsp; &nbsp;
				</button>
				<button>
			<a href='http://localhost/workshop/scr/wyswietlWiadomosci.php'>Wiadomosci</a> &nbsp; &nbsp;
				</button>
				<button>
			<a href='http://localhost/workshop/scr/list_all_users.php'>Uzytkownicy </a> &nbsp; &nbsp;
				</button>
				<button>
			<a href='http://localhost/workshop/scr/editUser.php'>Edytuj </a> &nbsp; &nbsp;
				</button>
				<button>
		    <a href='http://localhost/workshop/scr/wyloguj1.php'>Wyloguj</a> &nbsp; &nbsp;
				</button><br><br><br>

");
?>