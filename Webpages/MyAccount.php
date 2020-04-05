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
    
    if ($_POST['update']){
			    $_SESSION['Sname'] = $_POST['name'];
			    $_SESSION['Sbreed'] = $_POST['breed'];
			    $_SESSION['Sbio'] = $_POST['bio'];
			    $_SESSION['Sage'] = $_POST['age'];
			    $_SESSION['Spicture'] = $_POST['picture'];
			    $qry= "Call modifyProfile('$_SESSION[accNum]', '$_POST[name]', '$_POST[breed]', '$_POST[bio]', '$_POST[age]', '$_POST[picture]');";
                $stmt = $conn->prepare($qry);
                $stmt->execute();
			}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Woof!</title>
    <link rel="stylesheet" href="index.css" type="text/css">
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

<h1> My Profile </h1>
  </div class = "loginbtns">
    <tr id="main">
        <td id="border">&nbsp;</td>
        <td colspan="4">
		<form action="myAccount.php" method = "post">
			<p class="loginbtns">
		          <label>Name: </label>
		          <input type = "text"
        	         id = "name" name = "name" value = "<?php echo"$_SESSION[Sname]"; ?>"/>
		        </p> 
			<p class="loginbtns">
		          <label>Breed:</label>
		          <input type = "text"
        	         id = "breed" name = "breed" value = "<?php echo"$_SESSION[Sbreed]"; ?>"/>
		        </p> 
			<p class="loginbtns">
		          <label>Bio:</label>
		          <input type = "textbox"
        	         id = "bio" name = "bio" value = "<?php echo"$_SESSION[Sbio]"; ?>"/>
		        </p> 
			<p class="loginbtns">
		          <label>Age:  </label>
		          <input type = "text"
        	         id = "age" name = "age" value = "<?php echo"$_SESSION[Sage]"; ?>"/>
		        </p> 
			<p class="loginbtns">
        	  <label>Picture: </label>
        	  <input type = "file"
        	          id = "picture" name = "picture" value = "<?php echo"$_SESSION[Spicture]"; ?>"/>
        		</p>
			<p class="loginbtns">
			<input type="submit" name = "update" value="Update Profile">
			<?php
			?>
			</p>
		</form>		
		</td>
        <td id="border">&nbsp;</td>
    </tr>
    <tr id="bottombdr">
        <td id="border">&nbsp;</td>
        <td colspan="4", id="bottom">&nbsp;</td>
        <td id="border">&nbsp;</td>
    </tr>
</table>
</table>
</body>
</html>


