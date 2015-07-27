<?php

	class Tweets{

	/*CREATE TABLE Tweets(
	id int AUTO_INCREMENT,
	user_id int NOT NULL,
	text varchar(140) NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(user_id) references Users(id)
	);
	
	
	
	
	*/
	
	
		private $id;
		private $user_id;
		private $text;
	
		public function __construct(){
			$this->id=-1;
			$this->user_id="";
			$this->text="";
		}
		
		public function create (mysqli $conn, $text, $user_id){
		if($text>140){
			echo("Za dlugi tweet");
			return;
		}
		
		$sqlInsertTweet="INSERT INTO Tweets(user_id,text) VALUES ('".$user_id."','".$text."') ";
		
		$result=$conn->query($sqlInsertTweet);
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
		$sqlTweet="Select * FROM Tweets WHERE id='". $loggedUser."'  "  ;
		$result = $conn->query($sqlTweet);
		
		if($result->num_rows===1){
			$tweetData=$result->fetch_assoc();	
		
			$this->id=$tweetData["id"];
			$this->user_id=$tweetData["user_id"];
			$this->text=$tweetData["text"];
		}
		
		else{
			echo("Error during logging...<br>");
			echo("error:" .$conn->error."<br");
		}
		
	}
	
	public function getAllTweetComments(mysqli $conn) {
        $sqlComments = "SELECT * FROM comments  JOIN tweets   ON comments.comment_id=tweets.comment_id WHERE tweet.tweet_id=" .$_POST['text']."" ;
        $result = $conn->query($sqlComments);
        $retArray = array();

        var_dump($result);

        if($result->num_rows >= 0) {
            while($commentData = $result->fetch_assoc()) {

                $getComments = new Comments();
                $getComments->loadFromDataBase($conn, $commentData['id']);

                $retArray[] = $getComments;

            }
        }
        return $retArray;

    }

	
	public function showTweet(){
		
		echo("
			
			Uzytkownik:".$this->user_id."<br>
		
			<fieldset>	
				Tweet:".$this->text."<br>
			</fieldset>	
			
			
				");
	}
	
	
	public function generateLinkToMyPage(){
		return"<a href='http://localhost/workshop/scr/show_user.php?user_id=".$this->id."'>".$this->name."</a>";
	}
	
	}
	?>
	
	
	