<!DOCTYPE html>


<?php

$servername = "localhost";
$username = "nik";
$password = "iwp"; 

$conn = mysqli_connect($servername, $username, $password,'project');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}
else
	echo"connected";

?>

<link rel="shortcut icon" href="logo.jpg" type="image/jpg">
<link rel="stylesheet" href="part1style.css" type="text/css" >
<script src="part1.jss">
</script>

<style>

#top{
	background-image: url(background.jpg);
	position: fixed;
	top: 0;
	z-index:1;
	margin: 0px;
	right: 0;
	width: 100%;
	height:163px;
}
#topic{
	position: absolute;
	margin-left:77px;
	margin-top:39px;
	font-family: trend-sans-w00-four, sans-serif;
	font-size: 38px;

}


.item{
    border-style: solid;
    border-color:grey; 
    border-width: 0px 1px 0px 0px;
    color:black;
    font-family: "Comic Sans MS";
    padding: 0px 10px 0px 10px;
    text-decoration: none;
}

#menu{
    border: 0px;
    
    left:0px;
    width:100%;
    height:10px;
    z-index:1;
    padding: 18px 10px 25px 10px;
	background-color:#ADCFE1;
	position:fixed;
	top:150px;
	text-align: center;
    font-size: 85%;
   /* position:fixed;*/

}
 
#menu a:hover{
    color: grey;

}

#add{
	
	font-size: 15px;
	position: absolute;
	top:30px;
	right:50px;
}
#add span{
	font-weight: bold;
}

#middle{
	position: relative;
	background-color: #F2F0F1;
	padding-top:150px;
	padding-bottom:0px;
	position: relative;
	clear:both;
}


#topic{
	position: absolute;
	margin-left:77px;
	margin-top:39px;
	font-family: trend-sans-w00-four, sans-serif;
	font-size: 38px;
}

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
  

<div id="top">
<div id="topic" Style="font-family:font-family: Franklin Gothic Medium;"	>
        E-Health Care 
        </div>
        
        <div id="add">
            Address:GGSIPU<br>
            <span>email: E-Health Care@gmail.com</span>
        </div>

</div>
<div id="menu" >
     <a class="item" href="home.php">Home</a> 
     <a class="item" href="sub/aboutus.php">About us</a> 
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
  
<div id="middle">
<div id="100" class="layout" ="changecolors()">

<label> <h2>Consult a Doctor Anytime, Anywhere!</h2> </label>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;	border:3px solid brown;">
<img  alt="appointment1.png" class="img" src="appointment1.png"  onmouseout="src='appointment1.png'" onmouseover="src='.png'" onclick="document.getElementById('id01').style.display='block'">
<br>
<div class="nestedbutton">Schedule</div></button>

</img>

<div id="id01" class="modal" >
  
  
  <form class="modal-content animate" action="next1.php">
 
    <div class="imgcontainer">
	    <div class="head1">Schedule An Appointment</div>

      <span onclick="funcancel()" class="close" title="Close Modal">&times;</span>
	 
    </div>
	
    <div class="container" id="location">
	<b>Select Location:</b><br>
	<img  class="img" style="float:right; width:50%; height:70%;" src="map.jpeg"  onmouseout="src='map.jpeg'" onmouseover="src='map.png'" onclick="document.getElementById('id01').style.display='block'">
	
	<!--<a href="javascript:void(0);" onclick="getSpecialityListing(4, 'Punjab');">Punjab</a>
	-->
<?php
$lquery=mysqli_query($conn,"Select * from location");
while($row=mysqli_fetch_assoc($lquery))
{
	$location_id=$row['location_id'];
	$location_name=$row['location_name'];
	?>
	
	<button class="buttonx" type="button" onclick="getSpecialityListing('<?php echo $location_id; ?>','<?php echo $location_name; ?>');"><?php echo $location_name; ?></button><br>
	  
<?php
}	 
?>

</div>
	

<div class="container" id="speciality" style="display:none;">
	
<div class="tableft">
<b>Select Speciality:</b>
<ul class="tab" id="ultab">
<?php
$squery=mysqli_query($conn,"Select * from speciality");
while($row=mysqli_fetch_assoc($squery))
{
	$speciality_name=$row['speciality_name'];
	$speciality_id=$row['speciality_id'];
	?>
	 <li><a href='#' class='tablinks' onclick="funspeciality(event,'<?php echo $speciality_name; ?>','<?php echo $speciality_id; ?>')"><?php echo $speciality_name; ?>
	 </a>
	 </li>

<?php
}	 
?>
</ul>
</div>

<?php
$squery=mysqli_query($conn,"Select * from speciality");
while($row=mysqli_fetch_assoc($squery))
{
	$speciality_name=$row['speciality_name'];
	$speciality_id=$row['speciality_id'];
	$description=$row['description'];
	?>
 <div id="<?php echo $speciality_name; ?>" class="tabcontent">
  <h3><?php echo $speciality_name; ?></h3>
  <img width="250px"; height="150px"; src="images/speaciality/<?php echo $speciality_name?>.png">
  <p><?php echo $description; ?></p>
</div>

<?php
}	 
?>

<button type="button" style="float:right;" class="cancelbtn" onclick="funnext()">Next</button>

</div>



<div class="container" id="hospital" style="display:none;">		

<div class="tableft" id="tableft2">

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
			 <a href="#" class="tablinks" onclick="funhospital(event,'<?php echo $row['hospital_name']?>','<?php echo $row['hospital_id'] ?>')"> <?php echo "<br>" .$row["hospital_name"]."<br>";?>
			 </a>
			 </li>
			 
	<?php
		  
	 }
}
}

}
else {echo "No Hospital Found at this location";}

?>


</ul>


</div>

<div id="hospital_id" class="tabcontent">
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



<div class="container" id="doctor" style="display:none;">

	<a href="javascript:void(0);" onclick="getSpecialityListing(4, 'Punjab');">Punjab</a>
</div>
	

<div class="container" id="appointment" style="display:none;">
	
	<a href="javascript:void(0);" onclick="getSpecialityListing(4, 'Punjab');">Punjab</a>

</div>


	 <button style="margin-right:700px;" type="button" onclick="funbutton()" class="cancelbtn">Back</button>
     <button type="button"  class="cancelbtn" onclick="funcancel()">Cancel</button>

</form>
</div>































<!--               ========================= PART 2  ==================================================  -->

<button onclick="location.href='next1.php';" style="width:auto;">
<img class="img" src="specialities.png" onmouseover="src='.png'" onmouseout="src='specialities.png'" onclick="location.href='next1.php';"  >
<br>
<div class="nestedbutton">Find</div></button>


<div id="id01" class="modal" >
  
  
  <form class="modal-content animate" action="next1.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="logo1.jpg" alt="Avatar" class="avatar" style="width:90px">
    </div>

    <div class="container">
      
	<label><b>Location<b></label>
	<input list="city" name="city" placeholder="Select City" autofocus required >

    <datalist id="city">
    <option value="Delhi">
    <option value="Chennai">
    <option value="Mumbai">
    <option value="Kolkata">
    </datalist>
	
    
      <button type="submit">NEXT</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</div>





<button onclick="location.href='next2.php';" style="width:auto;">
<img class="img" src="specialities.png" onmouseover="src='.png'" onmouseout="src='specialities.png'" onclick="location.href='next1.php';"  >
<br>
<div class="nestedbutton">View</div></button>



<div id="id01" class="modal" >
  
  
  <form class="modal-content animate" action="next1.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="logo1.jpg" alt="Avatar" class="avatar" style="width:90px">
    </div>

    <div class="container">
      
	<label><b>Location<b></label>
	<input list="city" name="city" placeholder="Select City" autofocus required >

    <datalist id="city">
    <option value="Delhi">
    <option value="Chennai">
    <option value="Mumbai">
    <option value="Kolkata">
    </datalist>
	
    
      <button type="submit">NEXT</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</div>



</div>




<script>
function fundispdoc()
{
    window.location.href = "part11.php?loc_id=" + loc_id + "&" +"speciality_id="+speciality_id; 
	document.getElementById('id01').style.display='block';
	document.getElementById('hospital').style.display='block';
	
	//or by hidden input method
	
}
</script>

