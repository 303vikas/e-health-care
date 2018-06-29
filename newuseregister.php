<?php
require_once './library/config.php';
//require_once './library/functions.php';

$errorMessager = '&nbsp;';

if(isset($_POST['uregister']))
{
 session_start();
 $name = $_POST['uname']; 			// giving name variable value from input home.php
 $pass = $_POST['psw'];             // isset($_POST['data']) -taking empty input also?
 $rpass=$_POST['rpsw'];
 $dob=$_POST['dob'];
 $gender=$_POST['gender'];
 $date=date('Y/m/d');
  
    if($pass!=$rpass)
    {
        $errorMessager="Error In Password";
		exit;
 }
    
 else if($name && $pass && $dob && $gender  )
{
echo "asdf";
$query=mysqli_query($connect,"SELECT * from users WHERE username='$uname' ");  //variable query the just a shortcut for the command after =, command is important and is working without variable also 
$numrows = $query->num_rows;
if($numrows!=0)
{
	$errorMessager='You are already registered to our website';
	exit;
	}

$query=mysqli_query($connect,"SELECT * FROM users WHERE username='$uname' ");  //variable query the just a shortcut for the command after =, command is important and is working without variable also 
$numrows = $query->num_rows;

if($numrows!=0)
{
	$errorMessager='Username Not avaliable Try different username';
	exit;
	}

if($numrows==0)
{

$sql   = "INSERT INTO users (username, password, dob, gender)
		  VALUES ('$name', '$pass', '$dob','$gender')";

//$sql = " INSERT INTO `users` (`uname`, `upass`, `uaddress`, `umobile`, `uemail`, `udate`) 
//VALUES ('$name','$pass','$add','$mob','$email','$date')";

$check=mysqli_query($connect,$sql);

if($check==TRUE)
{
$errorMessager="Congrats users $name is successfully registered";
}

else
die('Error in inserting values to database');

}

else
die("please provide all the required fields");

}
}

?>

