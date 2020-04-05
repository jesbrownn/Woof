<?php
session_set_cookie_params(0);
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Woof!</title>
    <link rel="stylesheet" href="Matches.css" type="text/css">
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
      <div class="container">
        <h2>Your Matches</h2>
        <form method="post">
	<table>
	       <tr>
		 <th>Picture</th>
		 <th>Name</th>
		 <th>Email</th>
		 <th>Breed</th>
	       </tr>
	       
	       <?php
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

$sql = "SELECT accountNum FROM Accounts WHERE email = '".$_SESSION[SEmail]."';";
echo "$sql";
$accNum = ($conn->query($sql))->fetch();

$sql = "SELECT getMatches(".$accNum[0].");";
echo "$sql";
$result = ($conn->query($sql))->fetch();

if ($result-> num_rows > 0){
	while ($row = $result-> fetch_assoc()){
		echo "<tr><td>".$row["picture"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["breed"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "No Matches Found";
}

?>
	       
	</table>
	</form>
      </div>
    </div>

    <div class="footer">
      <div class="container">
        <p>Thanks for visiting our page!</p>
      </div>
    </div>
  </body>
</html>
