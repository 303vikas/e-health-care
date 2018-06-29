
<?php
if(isset($_POST['submitdetails']))
{
 session_start();
 $firstname = $_POST['name']; // giving name variable value from input home.php
 $lastname = $_POST['lname'];  // isset($_POST['data']) -taking empty input also?
 $phone=$_POST['phone'];
 $age=$_POST['age'];
 $address=$_POST['address'];
 $doctor_id=$_POST['doctor_id'];
 $hospital_id=$_POST['hospital_id'];
 $date=date("Y/m/d");
 $user_id=0;
 if(isset($_SESSION['username']))
 $username=$_SESSION['username'];
  
if($doctor_id && $hospital_id && $phone && $age && $doctor_id && $hospital_id )
{
$connect=mysqli_connect('localhost','root','','project') or die('database error'); 
$query=mysqli_query($connect,"SELECT * FROM appt WHERE firstname='$firstname'and doctor_id='$doctor_id' and lastname='$lastname' and date='$date' ");  //variable query the just a shortcut for the command after =, command is important and is working without variable also 
$numrows = $query->num_rows;
		if(isset($_SESSION['username']))
		{
		$query1=mysqli_query($connect,"SELECT id FROM users WHERE username='$username'");  
		$row1=mysqli_fetch_assoc($query1);
		$user_id=$row1['id'];
		}
if($numrows==0)
{
$sql = "INSERT INTO `appt` (`user_id`,`doctor_id`, `hospital_id`, `phone`, `age`, `firstname`, `lastname`, `address`, `date`, `status`) 
VALUES ($user_id,$doctor_id, $hospital_id, $phone, $age, '$firstname', '$lastname', '$address', '$date',0)";

$check=mysqli_query($connect,$sql); //basically in mysqli_query first parameter is connection,and the the sql command
if($check==TRUE)
{

echo" Congrats appts $firstname your appoinment scheduled<br/>";
echo "Please note your doctor_id is {$doctor_id} " ;
print('Thanks <br/>');


header('LOCATION:home.php');
}

else
{	die('Error in inserting values to database');}
}

else
die('Only one appointment allowed a day with a doctor');

}
else
die("Provide the neccessary information");
}


?>
