<?php

class Comments{
	
	/*CREATE TABLE Comments(
	id int AUTO_INCREMENT,
	user_id int NOT NULL,
	tweet_id int NOT NULL,
	text varchar(140) NOT NULL,
	Creation_date datetime,
	PRIMARY KEY(id),
	FOREIGN KEY(tweet_id)references Users(id)
	
	);
	*/
	
	private $id;
	private $user_id;
	private $tweet_id;
	private $text;
	private $Creation_date;
	
	
	public function __construct(){
		$this->id=-1;
		$this->tweet_id="";
		$this->text="";
		$this->Create_date="";
	}
	
	
	Public function create (mysqli $conn, $user_id,$tweet_id,$text,$Creation_date){
		if($text>250){
			echo("komentarz za dlugi");
			return;
		}
		
		$sqlInsertComment="INSERT INTO Comments(user_id,tweet_id,text,Creation_date) VALUES ('".$user_id."','".$tweet_id."','".$text."','".$Creation_date."')";
		
		$result=$conn->query($sqlInsertComment);
		if($result==TRUE){
			$this->id=$conn->insert_id;
			$this->user_id=$user_id;
			$this->tweet_id=$tweet_id;
			$this->text=$text;
			$this->Creation_date=$Creation_date;
		}
		else{
			echo("Error:".$conn->error."<br>");
		}
			
		
	}
	
	public function getId(){
		return  $this->id;
	}
	
	 public function getUser_id(){
		return $this->user_id;
	 }
	 
	 public function getTweet_id(){
	 return $this->tweet_id;
	 }
	  public function getText(){
	 return $this->text;
	 }
	  public function getCreationDate(){
	 return $this->Create_data;
	 }
	 
	 public function setUser_id($user_id){
		 $this->user_id=$user_id;
	 }
	 
	 public function  setTweet_id($tweet_id){
		 $this->tweet=$tweet_id;
	 }
	public function setText($text){
		$this->text=$text;
	}
	public function setCreation_date($creation_date){
		$this->creation_date=$creation_date;
	}
	
	
	
	public function showComment(){
		echo("
				Data:".$this->creation_date."<br>
				Uzytkownik:".$this->user_id."<br>
				Tweet:".$this->tweet_id."<br>
				Komentarz:".$this->text."<br>
				");
	}
	public function loadFromDataBase(mysqli $conn ,$idTweetLoad){
		$sqlLoadComments="Select * FROM Comments  ";
		$result = $conn->query($sqlLoadComments);
		
		if($result->num_rows===1){
			$userData=$result->fetch_assoc();	
		
			$this->id=$commentData["id"];
			$this->user_id=$commentData["user_id"];
			$this->tweet_id=$commentData["tweet_id"];
			$this->text=$commentData["text"];
			$this->creation_date=$commentData["creation_date"];
		}
		
		else{
			echo("Error during logging...<br>");
			echo("error:" .$conn->error."<br");
		}
		
	}
	
	
	}
	?>
	

	
	
	
	
