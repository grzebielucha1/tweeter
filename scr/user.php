<?php

class User{
	/* CREATE TABLE Users(
	id int AUTO_INCREMENT,
	nick varchar(255) UNIQUE NOT NULL,
	hashed_password varchar(60) NOT NULL,
	description text,
	PRIMARY KEY(id)
	);
	*/
	private $id;
	private $name;
	private $desc;
	
	
	public function __construct(){
		$this->id=-1;
		$this->name="";
		$this->desc="";
	}
	
	
	Public function register (mysqli $conn, $name,$desc,$password,$password_2){
		if(strlen($name)>=3&& strlen($password)>=3){
			if($name==name&& $password==password){
			}
		}
		else{
				echo("login i haslo powinny miec wiecej niz 3 znaki");
				return;
		}
				
		if($password_2!=$password){
			echo("Password does not match");
			return;	
				}
	
		
	
				
		
		$options=[
		
				'cost'=>11,
				'salt'=> mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),
		];
	
		
		
		$hashedPas=password_hash($password,PASSWORD_BCRYPT ,$options);
		$sqlInsertUser="INSERT INTO Users(nick,hashed_password,description) VALUES ('".$name."','".$hashedPas."','".$desc."')";
		
		$result=$conn->query($sqlInsertUser);
		if($result==TRUE){
			$this->id=$conn->insert_id;
			$this->name=$name;
			$this->desc=$desc;
		}
			
		else{
			echo("Error:".$conn->error."<br>");
		}
			
	}
		
	
	public function getId(){
		return  $this->id;
	}
	
	 public function getName(){
		return $this->name;
	 }
	 
	 public function getDesc(){
	 return $this->desc;
	 }
	 
	 public function setId($id){
		 $this->id=$id;
	 }
	 
	 public function  setName($name){
		 $this->name=$name;
	 }
	public function setDesc($desc){
		$this->desc=$desc;
	}
	public function login(mysqli $conn,$name,$insertedPassword){
		$sqlGetUser="SELECT * FROM Users Where nick='".$name."'";
		$result=$conn->query($sqlGetUser);
		If($result->num_rows===1){
			$userData=$result->fetch_assoc();
			if (password_verify($insertedPassword, $userData["hashed_password"])){
				$this->id=$userData["id"];
				$this->name=$userData["nick"];
				$this->desc=$userData["description"];
			}
			else{
				echo("bledny login lub haslo<br");
			}
		}
		else{
			echo("Blad podczas logowania...<br>");
			echo("Blad:" .$conn->error."<br");
			}
		
	}
	public function showUser(){
		echo(" 
				<fieldset>
					
					Uzytkownik:".$this->name."<br>
					<br>
					<fieldset>
					O mnie:".$this->desc."<br>
					</fieldset>
				</fieldset>
				<br>
				<br>
				");
	}
	public function loadFromDataBase(mysqli $conn ,$idToLoad){
		$sqlLoadUser="Select * FROM Users WHERE id='".$idToLoad."' ";
		$result = $conn->query($sqlLoadUser);
		
		if($result->num_rows===1){
			$userData=$result->fetch_assoc();	
		
			$this->id=$userData["id"];
			$this->name=$userData["nick"];
			$this->desc=$userData["description"];
		}
		
		else{
			echo("Error during logging...<br>");
			echo("error:" .$conn->error."<br");
		}
		
	}
	
	
	public function getAllMyPosts(mysqli $conn, $numberOfPosts) {
        $sql = "SELECT * FROM Tweets WHERE user_id = '".$this->id."' LIMIT ".$numberOfPosts ;


        $result = $conn->query($sql);
        $retArray = array();

        var_dump($result);

        if($result->num_rows >= 0) {
            while($tweetData = $result->fetch_assoc()) {

                $getTweet = new Tweets();
                $getTweet->loadFromDataBase($conn, $tweetData['id']);

                $retArray[] = $getTweet;

            }
        }
        return $retArray;

    }

	public function getAllPosts(mysqli $conn) {
        $sql = "SELECT * FROM Tweets ";


        $result = $conn->query($sql);
        $retArray = array();

        var_dump($result);

        if($result->num_rows >= 0) {
            while($tweetData = $result->fetch_assoc()) {

                $getTweet = new Tweets();
                $getTweet->loadFromDataBase($conn, $tweetData['id']);

                $retArray[] = $getTweet;

            }
        }
        return $retArray;

    }


	
	
	public function getAllMessage(mysqli $conn, $numberOfMessage) {
        $sql = "SELECT * FROM message WHERE user_id= '".$this->id."' LIMIT ".$numberOfMessage ;

        $result = $conn->query($sql);
        $retArray = array();

        var_dump($result);

        if($result->num_rows >= 0) {
            while($messageData = $result->fetch_assoc()) {

                $getMessage = new Message();
                $getMessage->loadFromDataBase($conn, $messageData['id']);

                $retArray[] = $getMessage;

            }
        }
        return $retArray;

    }

	
	
	
	
	public function generateLinkToMyPage(){
		return"<a href='http://localhost/workshop/scr/show_user.php?user_id=".$this->id."'>".$this->name."</a>";
	}
	
	public function saveToDatabase(mysqli $conn ,$newDesc,$newPass,$newPass_2){
		if($newPass_2!==$newPass){
			echo("Password does not match");
			return;
		}
		
		$options=[
		
				'cost'=>11,
				'salt'=> mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),
		];
		
		$hashedPas=password_hash($newPass,PASSWORD_BCRYPT ,$options);
		$sqlUpdateUser="UPDATE Users SET hashed_password='".$hashedPas."' ,description='".$newDesc."' where id=".$this->id;
	
		
		$result=$conn->query($sqlUpdateUser);
		if($result==TRUE){
			$this->desc=$newDesc;
		}
		else{
			echo("Error:".$conn->error."<br>");
		}
		
	}
}
	
	
	
	
