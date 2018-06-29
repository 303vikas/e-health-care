
<?php
$errorMessage = '';

require('library/config.php');

if(isset($_POST['ulogin']))
{
$errorMessage = '';
	
session_start();
 $name = $_POST['uname']; 
 $pass = $_POST['upass']; 
 $utype=$_POST['utype'];
	if ($name == '') {
		$errorMessage = 'You must enter your username';
	} else if ($pass == '') {
		$errorMessage = 'You must enter the password';
	}
	else if ($utype=="0") {
		$errorMessage = 'Please Select the user type';
	} 
	else {
		
		if ($name && $pass && $utype!="0")   
		{  	
			
			if($utype=="admin")
			{
				if($name == 'admin' && $pass == 'admin123'){
				$_SESSION['userid'] = 0;
				$_SESSION['username'] = 'Administrator';
				$_SESSION['usertype'] = 'admin';
				header("Location: Welcome.php");
				exit;
			}
			else {
				$errorMessage = 'You are Not an Admin. Please Login using another Role.';
			}
			
			}
	
			else if($utype=="user")
			{
			$query=mysqli_query($connect,"SELECT * FROM users WHERE username='$name' ");	
			$numrows = $query->num_rows;
			if($numrows!=0)
				{
				while($row = mysqli_fetch_assoc($query))
					{
						$dbusername= $row['username'];
						$dbpassword= $row['password'];
						$dbuid=$row['id'];
						if($name==$dbusername && $pass==$dbpassword)
							{	$_SESSION['userid'] = $dbuid;
								$_SESSION['username'] = $dbusername;
								$_SESSION['usertype'] = 'user';
								header("Location: Welcome.php");
								exit;
							}

					else
						$errorMessage='Incorrect Password';

					}


				}


			else
				$errorMessage="user $name is  not registerd";

			}
			else if($utype=="doctor")
			{	
				$query=mysqli_query($connect,"SELECT * FROM doctor WHERE doctor_uname='$name' ");	
			$numrows = $query->num_rows;
			if($numrows!=0)
				{
				while($row = mysqli_fetch_assoc($query))
					{
						$dbusername= $row['doctor_uname'];
						$dbpassword= $row['doctor_password'];
						$dbeid=$row['doctor_id'];
						if($name==$dbusername && $pass==$dbpassword)
							{	$_SESSION['userid'] = $dbeid;
								$_SESSION['username'] = $dbusername;
								$_SESSION['usertype'] = 'doctor';
								header("Location: Welcome.php");
								exit;
							}

					else
						$errorMessage='Incorrect Password';

					}


				}


			else
				$errorMessage="Doctor $name is  not registerd";

			
			}


			
		}
		


		}
		header("Location: home.php");
								
}
?>
