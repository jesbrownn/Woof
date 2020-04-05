<?php
session_set_cookie_params(0);
session_start();
$servername = "xx";
$username = "xx";
$password = "xx";
$database = "xx";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }


	$result = ($conn->query("SELECT login('$_POST[email]', '$_POST[password]');"))->fetch();


//["login('$_POST[email]', '$_POST[password]')"];


	if($result[0] == 1) {
	        $_SESSION['SEmail'] = $_POST['email'];
	        $sql = "SELECT accountNum FROM Accounts WHERE email = '$_SESSION[SEmail]';";
            $result = ($conn->query($sql))->fetch();
            $_SESSION['accNum'] = $result[0];
            $sql = "SELECT name, breed, bio, age, picture FROM Accounts WHERE accountNum = ".$_SESSION[accNum].";";
            $result = ($conn->query($sql))->fetch();
            $_SESSION['Sname'] = $result[0];
            $_SESSION['Sbreed'] = $result[1];
            $_SESSION['Sbio'] = $result[2];
            $_SESSION['Sage'] = $result[3];
            $_SESSION['Spicture'] = $result[4];

    		header( "Location: findMatches.php" );
	}else{
    		header( "Location: index.html" );
    		echo("Incorrect email or password");
    	}

?>
