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


#newsection
{background-color:#eeeeee;
width:500px;
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
    width:200px;
    float:left;
    padding:5px;
	padding-top:150px;
		
}
#section {

    width:600px;
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
<div id="top">
<div id="topic" Style="font-family:font-family: Franklin Gothic Medium;"	>
        E-Health Care 
        </div>
        
        <div id="add">
            Address:GGSIPU<br>
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



</head>


<html>
<head>
<form action='logout.php' method=POST>
<input type='submit' value='  logout  ' >
</form>
<body>



<div id="nav" >

<a href='#' class='tablinks' onclick="vapp('<?php if(isset($row['doctor_id'])) echo $row['doctor_id']; ?>')">View Appoinments</a>

</div>
<div id="section">
<?php
if(isset($_POST['appid']))
{$appid=$_POST['appid'];
echo'Details of Appointment Id: ';
echo $_POST['appid'];

$conn=mysqli_connect('localhost','root','','project') or die('database error'); 
$query5=mysqli_query($conn,"Select * from appt WHERE app_id='$appid' ");
$row2=mysqli_fetch_array($query5);

?><table>
<tr>
<td>AppoinmentId</td>
<td><?php echo $row2['app_id']; ?></td>
</tr>
<tr>
<td>user_id</td>
<td><?php echo $row2['user_id']; ?></td>
</tr>
<tr>
<td>doctor_id</td>
<td><?php echo $row2['doctor_id']; ?></td>

</tr>

<tr>
<td>hospital_id</td>
<td><?php echo $row2['hospital_id']; ?></td>
</tr>

<tr>
<td>phone</td>
<td><?php echo $row2['phone']; ?></td>

</tr>
<tr>
<td>Address</td>
<td><?php echo $row2['address']; ?></td>

</tr>
<tr>
<td colspan="1">username</td>
<td colspan="1"><?php print($row2['firstname']." " .$row2['lastname']);  ?></td>
</tr>

<tr>
<td>Age</td>
<td><?php print($row2['age']); ?></td>

<tr>
<td>Date</td>
<td><?php print($row2['date']); ?></td>


</tr>
<tr>
<td>Status</td>
<td><?php 
		if($row2['status']==0)
		echo"Scheduled"; 
		else if($row2['status']==1)
		echo"Approved";
else if($row2['status']==2) echo"Cancelled"; ?></td>

</tr>



</table>

<?php
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