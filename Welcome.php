<?php
session_start();
//require('library/config.php');
?>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

#menu{
background-color:#ADCFE1;
position:fixed;
top:150px;
z-index:2;}
</style>
<div id="top">
<div id="topic" Style="font-family:font-family: Franklin Gothic Medium;"	>
        E-Health Care 
        </div>
        
        <div id="add">
            Address:GGSIPU <br>
            <span>email: E-Health Care@gmail.com</span>
        </div>
		<?php if(isset($_SESSION['username']))
	   {?>
		<form style="text-align:right;" action='logout.php' method=POST>
		<input type='submit' value='  logout  ' >
		</form>
		<?php
	   }?>
 </div>
 
<div id="menu">
     <a class="item" href="home.php">Home</a> 
     <a class="item" href="subs/aboutus.html">About us</a> 
      <!--<a class="item" href="#" >Login</a>
       <a class="item" href="#" onclick="">Sign up</a>-->
	   <?php if(isset($_SESSION['username']))
	   {?><a class="item" href="Welcome.php">My Corner</a>
		<?php
	   }
	   else
		{?>
	<button  onclick="document.getElementById('newlogin').style.display='block'"  style="width:auto;padding:2px 2px; margin:2px 0; 	border:1px solid brown;">
		Login/Register</button><?php
		}
		?>
</div>

<?php
echo $_SESSION['username'];
if(!$_SESSION['username'])
die('You must be logged in');

else
{ if($_SESSION['usertype']=="doctor")
	{
  $myname=$_SESSION['username'];
  $connect=mysqli_connect('localhost','root','','project') or die('database error');  // server,id,pass,database

  $query=mysqli_query($connect,"SELECT * FROM doctor WHERE doctor_uname='$myname' ");
  $row =mysqli_fetch_assoc($query);
  $img=$row['picture'];
  $doctor_id=$row['doctor_id'];
	}
else if($_SESSION['usertype']=="user")
	{
  $myname=$_SESSION['username'];
  $connect=mysqli_connect('localhost','root','','project') or die('database error');  // server,id,pass,database

  $query=mysqli_query($connect,"SELECT * FROM users WHERE username='$myname' ");
  $row =mysqli_fetch_assoc($query);
  $img=$row['image'];
	}
}

?>

<style>


#newsection
{background-color:#eeeeee;
width:400px;
height:500px;
float:left;
padding:10px;
padding-top:200px;

}

#header {
    background-color:green;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:500px;
    width:100px;
    float:left;
    padding:5px;
	padding-top:150px;
		
}
#section {

    width:900px;
    float:left;
    padding:10px;	 	 
	padding-top:150px;
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>

</head>


<html>
<head>
<form action='logout.php' method=POST>
<input type='submit' value='  logout  ' >
</form>
<body>



<div id="nav" >
<!--<form action='?' method='POST' >
<input class="button" type='submit' value='View Appoinments' name='vapp' >
</form>--->

<a href='#' class='tablinks' onclick="vapp('<?php if(isset($row['doctor_id'])) echo $row['doctor_id']; ?>')">View Appoinments</a>

</div>


<?php
if(isset($_POST['changestatus']))
{$y=0;
$conn=mysqli_connect('localhost','root','','project') or die('database error'); 
$query5=mysqli_query($conn,"Select * from appt WHERE doctor_id='$doctor_id' ");
while($row2=mysqli_fetch_array($query5)){
	$x=$row2['app_id'];
	if(isset($_POST[$x]))
	$z=$_POST[$x];
	else $z=0;
	$y=$row2['status'];
	if($z==1)
	{
	$y=1;	
	}
	else if($z==2)
	{
	$y=2;	
	}
	else if($z==3)
	{
	$y=3;
	}
	$query6=mysqli_query($conn,"UPDATE appt SET status='$y' WHERE app_id='$x'");
	$y=0;
	}

}

?>

<?php 
if($_SESSION['usertype']=="user")
{
$username=$_SESSION['username'];
echo'<div id="section">';
echo'<h2>Home</h2>';
print('Welcome  '); 
print( $myname);
$conn=mysqli_connect('localhost','root','','project') or die('database error'); 
$query1=mysqli_query($connect,"SELECT id FROM users WHERE username='$username'");  
$row1=mysqli_fetch_assoc($query1);
$user_id=$row1['id'];
		
$query=mysqli_query($conn,"Select * from appt WHERE user_id='$user_id' ");
?><table>
<tr>
<td>AppoinmentId</td>
<td>user_id</td>
<td colspan="2">username</td>
<td>Age</td>
<td>Status</td>
</tr>
<?php
while($row2=mysqli_fetch_array($query)){
	?>
<tr>
<form action="viewappdetails.php" method="POST">
<td><input class="button1"type="submit" name='appid' value='<?php echo $row2['app_id']; ?>' ></td>
</form>
<td><?php echo $row2['user_id']; ?></td>
<td colspan="2"><?php print($row2['firstname']." " .$row2['lastname']);  ?></td>
<td><?php print($row2['age']); ?></td>
<td><?php 
		if($row2['status']==0)
		echo"Scheduled"; 
		else if($row2['status']==1)
		echo"Approved";
else if($row2['status']==2) echo"Cancelled"; ?></td>
</tr>

<?php	
}
echo'</table>';
echo'<a href="part1.php">Schedule Your appoinment</a>';
echo'</div>'
?>
<?php
}
//else echo'<div id="section"></div>';
?>


<?php 
if($_SESSION['usertype']=="doctor")
{
echo'<div id="section">';
echo'<h2>Home</h2>';
print('Welcome  '); 
print( $myname);
$conn=mysqli_connect('localhost','root','','project') or die('database error'); 
$query=mysqli_query($conn,"Select * from appt WHERE doctor_id='$doctor_id' ");
?><table>
<tr>
<td>Appoinment id</td>
<td>user_id</td>
<td colspan="2">username</td>
<td>Age</td>
<td>Phone</td>
<td>Address</td>
<td>Status</td>
<td>Change Status</td>
</tr>

<form action="?" method="POST">
<?php
while($row2=mysqli_fetch_array($query)){?>
<tr>
<?php if($row2['status']!=3){?>
<td><?php echo $row2['app_id']; ?></td>

<td><?php echo $row2['user_id']; ?></td>
<td colspan="2"><?php print($row2['firstname']." " .$row2['lastname']);  ?></td>
<td><?php print($row2['age']); ?></td>
<td><?php print($row2['phone']); ?></td>
<td><?php print($row2['address']); ?></td>
<td><?php
	    if($row2['status']==0)
		echo"Scheduled"; 
		else if($row2['status']==1)
		echo"Approved";
		else if($row2['status']==2) echo"Cancelled";?></td>
		
		<td><select name='<?php echo $row2['app_id'] ?>'>
<option value="0" selected>Pending</option>
<option value="1">Approve</option>
<option value="2">Cancel</option>
<option value="3">Delete</option>
</select>
</td><? } ?>
</tr>

<?php	
}
echo'</table>';
echo'<input type="submit" class="button1" name="changestatus" value="Done"></form>';
echo'</div>';
?>
<?php
}
?>

<div id="newsection">
<form action='?' method='POST' enctype="multipart/form-data">
<input type='file' name='image'>
<input type='submit' value='Upload profile picture' name='upload' >
</form>

<?php
if(isset($_POST['upload']))
{$imagename=$_FILES['image']['name'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
if($_SESSION['usertype']=="user")
$sql = "Update users SET image= '$image' Where username='$myname' ";  //name of image auto temp
else if($_SESSION['usertype']=="doctor")
$sql = "Update doctor SET picture= '$image' Where doctor_uname='$myname' ";  //name of image auto temp}

$check = mysqli_query($connect, $sql);
if($check==False)
echo 'Error uploading image';
else
{
echo 'Uploaded new profile picture';
if($_SESSION['usertype']=="user")
$img=$row['image'];

else if($_SESSION['usertype']=="doctor")
$img=$row['picture'];

header('LOCATION:Welcome.php');
}
}

if(isset($img))
{echo"<b> Your Profile Image<b></br>";
echo '<img src="data:image/jpeg;base64,'.base64_encode( $img ).'" height="200" width="200"/>' ;
}

?>
</div>


<div id="footer">
Copyright © localhost
</div>



</body>
</head>
</html>

<script>
function vapp(x)
{
alert(1);
 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("section").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getapp.php", true);
  xhttp.send();	
}

</script>