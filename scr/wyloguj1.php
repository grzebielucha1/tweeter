<?php
header('Content-type: text/html;charset=utf-8');
require_once("C:\\xampp\\htdocs\\workshop\\scr\\user.php");
require_once("C:\\xampp\\htdocs\\workshop\\scr\\connect.php");
session_start();

 if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['akcja']) && $_POST['akcja']=='wyloguj'){
			
			unset($_SESSION['user_id']);
			if(!isset($_SESSION['user_id'])){
					echo '<p>Zostales wylogowany</p>';
		}
	}
	
	?>
	<body>
	<form method="POST" action="#">
				<input type ="hidden" name="akcja" value="wyloguj"/>
				
	</form>
	<p>
	<a href="http://localhost/workshop/scr/login.php">Przejdz do panelu logowania</a>
	</p>
	</body>
	
<?php
die();
?>