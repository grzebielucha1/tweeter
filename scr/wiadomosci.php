<?php
class Message{
	
	
		private $id;
		private $user_id;
		private $text;
	
		public function __construct(){
			$this->id=-1;
			$this->user_id="";
			$this->text="";
		}
		
		public function create (mysqli $conn, $text, $user_id){
		if($text>255){
			echo("wiadomosc za dluga");
			return;
		}
		
		$sqlInsertMessage="INSERT INTO Message(user_id,text) VALUES ('".$user_id."','".$text."') ";
		
		$result=$conn->query($sqlInsertMessage);
		if($result==TRUE){
			$this->id=$conn->insert_id;
			$this->user_id=$user_id;
			$this->text=$text;
		}
		else{
			echo("Error:".$conn->error."<br>");
		}
			
		
	}
		
		public function getId(){
		return  $this->id;
	}
	
		public function getUserId(){
		return $this->user_id;
	 }
	 
		public function getText(){
	 return $this->text;
	 }
	 
	 
		public function  setUserId($user_id){
		 $this->name=$user_id;
	 }
		public function setText($text){
		$this->desc=$text;
	}
		
		public function loadFromDatabase(mysqli $conn , $loggedUser){
		$sqlMessage="Select * FROM Message WHERE id='". $loggedUser."'  "  ;
		$result = $conn->query($sqlMessage);
		
		if($result->num_rows===1){
			$messageData=$result->fetch_assoc();	
		
			$this->id=$messageData["id"];
			$this->user_id=$messageData["user_id"];
			$this->text=$messageData["text"];
		}
		
		else{
			echo("Error during logging...<br>");
			echo("error:" .$conn->error."<br");
		}
		
	}
	
	
	
	public function showMessage(){
		
		echo("
				Uzytkownik:".$this->user_id."<br>
				Wiadomosc::".$this->text."<br>
				");
	}
	
	
		
	
	
	public function generateLinkToMyPage(){
		return"<a href='http://localhost/workshop/scr/napiszWiadomosc.php?message_id=".$this->id."'></a>";
	}
	
	}
	?>
	
	
	
	
	
	
