<!DOCTYPE html>


<?php

$servername = "localhost";
$username = "nik";
$password = "iwp"; 

$conn = mysqli_connect($servername, $username, $password,'project');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}
else
	echo"connected11";

print_r($_GET)
?>

<html>
<link rel="shortcut icon" href="logo.jpg" type="image/jpg">
<link rel="stylesheet" href="part1style.css" type="text/css" >
<script src="part1.jss">
</script>

<style>

.layout
{	
	background-color:gray;
	height:350px;
	width:1000px;
	margin:70px 50px 40px 100px;
	
}
.img
{	
	height:200px;
	width:220px;
}

</style>
  


<div id="100" class="layout">

<label> <h2>Consult a Doctor Anytime, Anywhere!</h2> </label>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;	border:3px solid brown;">
<img  alt="appointment1.png" class="img" src="appointment1.png"  onmouseout="src='appointment1.png'" onmouseover="src='.png'" onclick="document.getElementById('id01').style.display='block'">
<br>
<div class="nestedbutton">Schedule</div></button>
</img>

<div id="id01" class="modal" style="display:block;">
  
  
  <div class="modal-content " >
 
    <div class="imgcontainer">
	    <div class="head1">Schedule An Appointment</div>

      <span onclick="funcancel1()" class="close" title="Close Modal">&times;</span>
	 
    </div>
	
    
	

<div class="container" id="speciality" style="display:none;">
SELECT SPECIALITY:
<div class="tableft">

<ul class="tab" id="ultab">
  <li><a href="#" class="tablinks" onclick="funspeciality(event, 'cardiology','1')">cardiology</a></li>
  <li><a href="#" class="tablinks" onclick="funspeciality(event, 'xyz','2')">Eye</a></li>
  <li><a href="#" class="tablinks" onclick="funspeciality(event, 'pqr','3')">Kidney</a></li>
</ul>

</div>

<div id="cardiology" class="tabcontent">
  <h3>heading1</h3>
  <p>data1.</p>
</div>

<div id="xyz" class="tabcontent">
  <h3>heading2</h3>
  <p>data 2.</p>
</div>

<div id="pqr" class="tabcontent">
  <h3>Heading3</h3>
  <p>The data contains under heading three
  </p>
</div>

   <button type="button" style="float:right;" class="cancelbtn" onclick="funnext()">Next</button>

</div>

<div class="container" id="hospital" style="display:<?php if(isset($_GET['loc_id']) && isset($_GET['speciality_id']))
	echo "block";
else
	echo "none";
?>;">
<div class="tableft" id="tableft2">
<b>Select Hospital:</b>

<ul class="tab" id="ultab">


<?php

if(isset($_GET['loc_id']) && isset($_GET['speciality_id']))
{	
	$loc_id=$_GET['loc_id'];
	$speciality_id=$_GET['speciality_id'];
	$sql ="SELECT * from hospital";
	$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 if($row["location_id"]==$loc_id){
			 ?>
			 <li>
			 <a href="#" class="tablinks" onclick="funhospital(event,'<?php echo $row['hospital_name']?>','<?php echo $row['hospital_id'] ?>','<?php echo $speciality_id ?>') "> <?php echo "<br>" .$row["hospital_name"]."<br>";?>
			 </a>
			 </li>
			 
	<?php
		  
	 }
}
}

else {echo "No Hospital Found at this location";}

}

?>




</ul>


</div>

<?php
$squery=mysqli_query($conn,"Select * from hospital");
while($row=mysqli_fetch_assoc($squery))
{
	$hospital_name=$row['hospital_name'];
	$hospital_id=$row['hospital_id'];
	$hospital_description=$row['hospital_description'];
	$hospital_location=$row['location_id'];
	?>
 <div id="<?php echo $hospital_name; ?>" class="tabcontent">
  <h3><?php echo $hospital_name; ?></h3>
  <img src="images/hospital/<?php echo $hospital_name?>.png">
  <p>This Hospital is in <?php 
$squery1=mysqli_query($conn,"Select * from location where location_id='$hospital_location'");
$row1=mysqli_fetch_assoc($squery1);
echo $row1['location_name'];
  ?>
  <?php echo $hospital_description; ?></p>
</div>

<?php
}	 
?>



     <button type="button" style="float:right;" class="cancelbtn" onclick="funnext()">Next</button>
	
</div>







<div class="container" id="doctor" style="display:<?php if(isset($_GET['hospital_id']) && isset($_GET['speciality_id']))
echo "block";
else echo"none";	?>;">
<div class="tableft" id="tableft2">
<ul class="tab" id="ultab">
<b>SELECT DOCTOR:</b>
<?php

if(isset($_GET['hospital_id']) && isset($_GET['speciality_id']))
{	$hospital_id=$_GET['hospital_id'];
	$speciality_id=$_GET['speciality_id'];
	$sql ="SELECT * from doctor";
	$result = $conn->query($sql);

if ($result->num_rows > 0) 
{	
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 if($row["hospital_id"]==$hospital_id  && $row['speciality_id']==$speciality_id){
			 ?>
			 <li>
			 <a href="#" class="tablinks" onclick="fundoctor(event,'<?php echo $row['doctor_name']?>','<?php echo $row['doctor_id'] ?>','<?php echo $hospital_id ?>')"> <?php echo "<br>" .$row["doctor_name"]."<br>";?>
			 </a>
			 </li>
			 
	<?php
		  
	 }
}
}
else {echo "No Doctor Found at this location";}

}

?>


</ul>


</div>

<?php
$squery=mysqli_query($conn,"Select * from doctor");
while($row=mysqli_fetch_assoc($squery))
{
	$doctor_name=$row['doctor_name'];
	$doctor_id=$row['doctor_id'];
	$profile=$row['profile'];
	$picture=$row['picture'];
	


	?>
 <div id="<?php echo $doctor_name; ?>" class="tabcontent">
  <h3><?php echo $doctor_name; ?></h3>
  
<?php if(isset($picture))
echo '<img src="data:image/jpeg;base64,'.base64_encode( $picture ).'" height="200" width="200"/>' ;
?>
  <p><?php echo $profile; ?></p>
</div>

<?php
}	 
?>






     <button type="button" style="float:right;" class="cancelbtn" onclick="funnext()">Next</button>
	

</div>
	

<div class="container" id="appointment" style="display:<?php if(isset($_GET['doctor_id']) && isset($_GET['hospital_id']))
echo "block";
else echo"none";	?>;">
Fill Your Infromation:
     <form id="details" name="details"  method="POST" onsubmit="fundetails()" action="final.php"> 
	 
      <br><label for="idname" >First Name  :</label>
	   <input style="width:30%" autofocus id="idname" name="name" type="text">
	   <label for="idlname">Last Name  :</label>
	   <input style="width:30%" id="idlname" name="lname" type="text"><br>
	  

	 
	  <label for="idphone">Phone :</label>
	 <input id="idphone" style="width:30%" name="phone" type="text">
	  <label for="Age">Age  :</label>
	  	 <input id="idage" style="width:30%" name="age" type="number"><br>
	   <label for="idaddress">Address:</label>
	  <textarea id="idaddress" rows="5" cols="105" name="address" ></textarea><br>
	  <input type="number" name="doctor_id" value="<?php if(isset($_GET['doctor_id'])) echo$_GET['doctor_id'] ?>" style="display:none;" >
	   <input type="number" name="hospital_id" value="<?php  if(isset($_GET['hospital_id'])) echo$_GET['hospital_id'] ?>"   style="display:none;"  >
	  
	  
     <input type="submit" name="submitdetails" value="Send" class="cancelbtn" >
	</form>
	
	 
</div>

	 <button style="margin-right:700px;" type="button" onclick="funbutton()" class="cancelbtn">Back</button>
     <button type="button"  class="cancelbtn" onclick="funcancel1()">Cancel</button>

</div>
</div>
















</body>
</html>

<script>

function fundetails()
{
	alert("Javascript Validation");
	
}
function fundispdoc2()
{	
	window.location.href = "part11.php?hospital_id="+ hospital_id + "&" +"speciality_id="+speciality_id; 
	document.getElementById('id01').style.display='block';
	document.getElementById('doctor').style.display='block';
	
}

function fundispdoc3()
{
	window.location.href = "part11.php?doctor_id="+ doctor_id + "&" +"hospital_id="+hospital_id; 
	document.getElementById('id01').style.display='block';
	document.getElementById('appointment').style.display='block';
}
function funcancel1()
{
		window.location.href = "part1.php"; 

}

</script>
