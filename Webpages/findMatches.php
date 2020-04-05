<?php
session_set_cookie_params(0);
	session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 
 <head>
 <style>
* {
  box-sizing: border-box;
}

.column {
  height:400px;
  width:33.33%;
  float:left;
  padding: 1px;
}


/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

 </style>
    <meta charset="utf-8">
    <title>Woof!</title>
    <link rel="stylesheet" href="template.css" type="text/css">
  </head>
  <body>
    <div class="header">
      <div class="container">
        <h1>Woof!</h1>
        <div class="text-background">
          <p>Find your perfect doggie playdate</p>
        </div>
      </div>
    </div>

    <div class="nav">
      <div class="container">
        <ul>
	      <li><a href="myAccount.php">My Profile</a></li>
              <li><a href="findMatches.php">Find Matches</a></li>
              <li><a href="matches.php">My Matches</a></li>
	      <li><a href="logout.php">Logout</a></li>
	      
        </ul> 
	
      </div>
    </div>

    <div class="main">
      
<div class="row"> 
<div class="column" style="width:23.33%">
	</div>
<div class="column" style="width:10%">
    <img src="Leftpaw.png" alt="Snow" style="width:100%; height:250px;">
	</div> 
  <div class="column" style="width:33.33%; border:1px solid black;">
    <img src="puppy.jpg" alt="Forest" style="width:50%">
      <?php
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

$sql = "SELECT age, name, breed, email FROM Accounts";
$result = $conn->query($sql);

    while($row = $result->fetch()) {
        if($row[email] == $_SESSION[SEmail])
            echo "age: " . $row["age"]. " - Name: " . $row["name"]. " Breed" . $row["breed"]. "<br>";
    }

?>

  </div>
  <div class="column" style="width:33.33%">
    <img src="Rightpaw.png" alt="Mountains" style="width:30%; height:250px;">
  </div>
</div>

    </div>

    <div class="footer">
      <div class="container">
        <p>Thanks for visiting our page!</p>
      </div>
    </div>
  </body>
</html>
