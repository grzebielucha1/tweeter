<?php
class Message{
	
	
		private $id;
		private $nadawca_id;
		private$odbiorca_id;
		private $text;
		private $Creation_date;
		private $status;
		
		
	
		public function __construct(){
			$this->id=-1;
			$this->nadawca_id="";
			$this->odbiorca_id="";
			$this->text="";
			$this->Creation_date="";
			$this->status="";
			
			
			
		}
		
		public function create (mysqli $conn, $nadawca_id,$odbiorca_id,$text,$Creation_date,$status){
		if($text>255){
			echo("wiadomosc za dluga");
			return;
		}
		
		$sqlInsertMessage="INSERT INTO message (nadawca_id, odbiorca_id, text,Creation_date,status) VALUES('".$_POST['nadawca_id']."',' ". $_POST['odbiorca_id']. "','".$_POST['text']."',' ". $_POST['Creation_date']. "',' ". $_POST['status']. "')";
		$result=$conn->query($sqlInsertMessage);
		if($result==TRUE){
			$this->id=$conn->insert_id;
			$this->nadawca_id=$nadawca_id;
			$this->odbiorca_id=$odbiorca_id;
			$this->text=$text;
			$this->Creation_date=$Creation_date;
			$this->status=$status;
				
		}
		
		else{
			echo("Error:".$conn->error."<br>");
		}
			
		
	}
		
		public function getId(){
		return  $this->id;
	}
	
		public function getNadawca_id(){
		return $this->nadawca_id;
	 }
	 public function getOdbiorca_id(){
		return $this->odbiorca_id;
	 }
	 
		public function getText(){
			return $this->text;
	 }
	 
	 public function getCreation_date(){
			return $this->Creation_date;
	 }
	 
	 public function getStatus(){
		 return $this->status;
	 }
	 
		public function  setNadawca_id($nadawca_id){
		 $this->nadawca_id=$nadawca_id;
	 }
		public function  setOdbiorca_id($odbiorca_id){
		 $this->odbiorca_id=$odbiorca_id;
	 }
	     	 
		public function setText($text){
			$this->text=$text;
	}
	
		public function setCreation_date($Creation_date){
			$this->Creation_date=$Creation_date;
	 }
	 
		public function setStatus($status){
			$this->status=$status;
		}
		
		
		public function  loadFromDataBase(mysqli $conn , $loggedUser){
		$sqlMessage="Select * FROM message WHERE id='". $loggedUser."'  "  ;
		$result = $conn->query($sqlMessage);
		
		if($result->num_rows===1){
			$messageData=$result->fetch_assoc();	
		
			$this->id=$messageData["id"];
			$this->nadawca_id=$messageData["nadawca_id"];
			$this->odbiorca_id=$messageData["odbiorca_id"];
			$this->text=$messageData["text"];
			$this->Creation_date=$messageData["Creation_date"];
			$this->status=$messageData["status"];
		}
		
		else{
			echo("Error during logging...<br>");
			echo("error:" .$conn->error."<br");
		}
		
	}
	
	
	
	public function showMessage(){
		
		echo("
				Uzytkownik:".$this->user_id."<br>
				Wiadomosc:".$this->text."<br>
				Wyslano:".$this->Creation_date."<br>
				Status:".$this->status."
				");
	}
	
		
	
	
	public function generateLinkToMyPage(){
		return"<a href='http://localhost/workshop/scr/napiszWiadomosc.php?message_id=".$this->id."'></a>";
	}
	
	}
	?>
	