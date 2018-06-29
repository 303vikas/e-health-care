<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

body, html {
    height: 100%;
	background-color:#F6FAFA;
}
.button1 {
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

    background-color: #555555;}

    .button1:hover { 
    background-color: grey;
    color:#555555; 
}


.parallax {
    /* The image used */
    background-image: url('.jpg');

    /* Full height */
    height: 100%;
    padding-top:100px;
    /* Create the parallax scrolling effect */
    background-attachment: fixe;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.parallax2 {
    /* The image used */
    background-image: url('health.jpg');

    /* Full height */
    height: 100%;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.box 
{   height:700px;
    background-color:#ADCFE1;
    font-size:36px;
    line-height: 1em; 
    text-align: center;
    color: #555555;

}
.bottom
{   height:200px;
    background-color:#263238;
    padding-top:10px;
    color: grey;
}
#menu{
background-color:#ADCFE1;
position:fixed;
top:150px;}
.header
{
	padding-top:150px;
	text-align:center;
	
}

.select1
{
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
	width:300px;
    cursor: pointer;

    background-color: #123456;}

    .button1:hover { 
    background-color: grey;
    color:#555555; 
	
}

.img-with-text {
    text-align: justify;
    width: 200px;
}

.img-with-text img {
    display: block;
    margin: 0 auto;
}
</style>
</head>
<body>
<?php
require("conn.php");
?>
<div id="top">
<div id="topic" Style="font-family:font-family: Franklin Gothic Medium;"	>
        E-Health Care 
        </div>
        
        <div id="add">
            Address:VIT university Chennai<br>
            <span>email: E-Health Care@gmail.com</span>
        </div>
 </div>
<div id="menu">
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

<meta name="viewport" content="width=device-width, initial-scale=1">

<h2>Subheading</h2>
<p>Description of heading</p>

</div>
<div class="header" >
<form name="searchdoctor" method="POST" action="?" onsubmit="return validatedoc()">
<h3 >Find Doctor</h3>
<select name="hospital" class="select1">
<option value="0">Choose Hospital</option>
<?php
$sql ="SELECT * from hospital";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
     // output data of each row
     while($row = $result->fetch_assoc()) 
	 { $id=$row['hospital_id'];
	   $name=$row['hospital_name'];
	   
		if(isset($_POST['searchdoctor']) && $_POST['hospital']==$id)
        echo"<option value='$id' selected>$name</option>";
	
		else
		echo"<option value='$id'>$name</option>";

	 }
}
?>
</select>

<select name="speciality" class="select1">
<option value="0">Choose Speaciality</option>
<?php
$sql ="SELECT * from speciality";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
     // output data of each row
     while($row = $result->fetch_assoc()) 
	 { $id=$row['speciality_id'];
	   $name=$row['speciality_name'];
	   	if(isset($_POST['searchdoctor']) && $_POST['speciality']==$id)
        echo"<option value='$id' selected>$name</option>";

	   
	    else echo"<option value='$id'>$name</option>";

	 }
}
?>
</select>


<input type="submit" value="Find" name="searchdoctor" class="button1"> 
</form>



<?php
if(isset($_POST['searchdoctor']))
{
$spec=$_POST['speciality'];	
$hos=$_POST['hospital'];

if($spec!=0 &&  $hos!=0)
{

$sql ="SELECT * from doctor WHERE speciality_id=$spec and hospital_id=$hos";

}
else if($hos!=0)
{
$sql ="SELECT * from doctor WHERE hospital_id=$hos";

}
else if($spec!=0)
{
	$sql ="SELECT * from doctor WHERE speciality_id=$spec && hospital_id=$hos";
}
$result = $conn->query($sql);

echo"<div style='width:830; background-color:white; height:120px;'>";

if ($result->num_rows > 0) 
{$temp=-1;
     // output data of each row
	 echo"<table><tr>";
     while($row = $result->fetch_assoc()) 
	 { $temp++;
		$id=$row['doctor_id'];
	   $name=$row['doctor_name'];
	   $picture=$row['picture'];
	  if($temp>=4)
	  {echo"</tr><tr>";
		$temp=0;
	  }
	   echo '<td><figure class="pic"><img style="float:left; display:inline" src="data:image/jpeg;base64,'.base64_encode( $picture ).'" height="200" width="200"/><figcaption>'.$name.'</figcaption></figure></td>' ;
	  
	  /*if($temp>=8)
	  {echo"</tr>";
		$temp=0;
	  }*/
	  }
}

echo"</tr></table>";
     
 echo "</div>";
 
}
?>


</body>
</html>


<script>
function validatedoc()
{var hos=document.forms['searchdoctor'].hospital.value;
var spc=document.forms['searchdoctor'].speciality.value;
if(hos==0 && spc==0)
{alert('select atleast one filter');
	return false;
}
}

</script>
