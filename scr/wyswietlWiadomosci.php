<?php
include("C:\\xampp\\htdocs\\workshop\\scr\\header.php");
?>
	<button>Wiadomosci Wyslane</button>
			<?php 
		$sqlWyslane="SELECT nadawca.id as n_id FROM nadawca JOIN message ON nadawca.n_id=message.n_id JOIN odbiorca ON odbiorca.id=message.id Where nadawca.n_id=" .$_POST['nadawca_id']."";
			$result = $conn->query($sqlWyslane);
 
				if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
						 echo (" ' ".$row['data']." '<br> '"  .$row['nick']. '" <br> '.$row['text']." ' " ); 
						}
				}
?>
			<button>Wiadomosci Odebrane</button>
			<?php 
		$sqlOdebrane="SELECT * FROM wyslane JOIN message ON wyslane.odbiorca_id=message.odbiorca_id JOIN odebrane ON odebrane.nadawca_id=message.nadawca_id Where wyslane.odbiorca_id=" .$_POST['user_id']."";
			$result = $conn->query($sqlOdebrane);
 
				if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
						 echo (" ' ".$row['data']." '<br> '"  .$row['nick']. '"  <br> '.$row['text']." ' " ); 
						}
				}
?>				
				<button>Wszystkie Wiadomosci</button>
			<?php 
		$sqlWszystkie="SELECT  FROM message  WHERE user_id=".$_POST['user_id']. "";
			$result = $conn->query($sqlWszystkie);
 
				if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
						 echo (" ' ".$row['data']." '<br> ' "  .$row['nick']. " '  <br> ' ".$row['text']." ' " ); 
						}
				}


				
include("C:\\xampp\\htdocs\\workshop\\scr\\napiszWiadomosc.php");

$loggedUser=new User();
$loggedUser->loadFromDataBase($conn,$_SESSION["user_id"]);



$retArray = $loggedUser->getAllMessages($conn, 40);

foreach(array_reverse($retArray) as $message) {
    echo "<br>";
    echo ($message->showMessage());
	

}

$retArray = $loggedUser->getAllMessages($conn, 40);

foreach(array_reverse($retArray) as $message) {
    echo "<br>";
    echo ($message->showMessage());
	

}

include("C:\\xampp\\htdocs\\workshop\\scr\\footer.php");
?>