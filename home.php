<!DOCTYPE html>
<?php
session_start();
require('newuseregister.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

<style>


/* Full-width input fields */
.box1,input[type=text], input[type=password],input[type=date],input[type=radio] {
    width: 100%;
    padding: 15px 20px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	background-color: rgba(0, 0, 0, 0.09);
}

input[type=text]:hover,input[type=password]:hover
{
	background-color:rgba(0, 0, 0, 0.15);
}
button:hover
{
	background-color:blue;
}

/* Set a style for all buttons */
button {
    background-color: lightblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}


/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 3; /* Sit on top */
    left: 0;
	border-radius:20px;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
	
	border-radius:20px;
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 25%; /* Could be more or less, depending on screen size */

}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: grey;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}




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
    background-color: white;
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
top:150px;
z-index:2;}



</style>
</head>

<?php
$errorMessage='';
?>

<body>
<div id="newlogin" class="modal">
  
  <div class="modal-content animate" >
    <div class="imgcontainer">
<span onclick="document.getElementById('newlogin').style.display='none'" class="close" title="Close Modal">&times;</span>
	</div>

    <form method='POST' action='newlogin.php' id='container' class="container">
<center>Login</center><br><br><br><br>
<center><?php echo $errorMessage; ?></center><br><br><br><br>
        
	<input type="text" placeholder="EMAIL" name="uname" required>
<br>      
      <input type="password" placeholder="PASSWORD" name="upass" required>
<br>  
		<label>
              <select name="utype" id="idutype" class="box1" required>
			  <option value="0" >&nbsp;&nbsp;--- Select User --- &nbsp;</option>
			  <option value="admin">&nbsp;&nbsp; Administrator &nbsp;</option>
			  <option value="user" selected>&nbsp;&nbsp; User &nbsp;</option>
			  <option value="doctor">&nbsp;&nbsp; Doctor &nbsp;</option>
              </select>
              </label>
			
      <button name="ulogin" type="submit">Login</button>
     <br><br>
      <span ><center>Looking to <a onclick="displayregister()" href="#">Create an account?</a></center></span>
    </form>
	
<form name='register' method='POST' action='?' id='container1' class="container" style="display:none;margin-top:50px;" onsubmit="return validate()">
	<center>Register</center><br><br><br><br>
     
      <input type="text" placeholder="USERNAME" name="uname" required>
<br>      
      <input type="password" placeholder="PASSWORD" id='psw' name="psw" required>
<br>     
 <input type="password" placeholder="REPEAT PASSWORD" id='rpsw' name="rpsw" required>
<br>      
<label for='dob'>Date of birth</label>
<input type='date'name='dob'><br>

Gender:<input type='radio' name='gender' value='male' /*checked*/>Male
<input type='radio' name='gender' value='female'/>Female

      <button name="uregister" type="submit">Create Account</button>
	  
		<br><br>
      <span ><center>Alredy have a account?<a onclick="displaylogin()" href="#">Login</a></center></span>
	  
</form>
	
  </div>
</div>









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
     <a class="item" style="color:blue;"><?php echo $errorMessager?></a>	 
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
<div class="parallax" style="padding-top:200px;">


<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <a href="part1.php">
  <img src="finddoctor.jpg" style="width:1350px ;height:350px; ">
  </a>
  
  <div class="text" ></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="bloodbank.jpg" style="width:100%;height:350px">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="healthcheck.jpg" style="width:100%;height:350px">
  <div class="text">C</div>
</div>

</div>
<br>

<div style="text-align:center;z-index:1;">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>




</div>




<div id="middle" style="background-color:#D1D1D1">
<center><h1 id="why">Why E-Health Care?</h1></center>
<hr width="20%" color="#ADCFE1" size="10px"><br>
<table align="center">
<tr>
<td><a style="color:black;text-decoration: none;" href="part1.php"><figure class="pic"><img style="margin-left:40px;"src="Capture1.png"><figcaption>Sechdule Appoinment</figcaption></figure></td>
<td><a style="color:black;text-decoration: none;" href="part1.php"><figure class="pic"><img src="Capture 2.png"><figcaption>Find Doctor</figcaption></figure></td>
<td><a style="color:black;text-decoration: none;" href="part1.php"><img style="margin-left:40px;" src="Capture 3.png"><figcaption style="margin-left:50px;" >Specialist</figcaption></figure></td></link>
<td><a style="color:black;text-decoration: none;" href="part2.php"><figure class="pic"><img src="Capture 4.png"><figcaption>Blood Bank</figcaption></figure></td>
<td><a style="color:black;text-decoration: none;" href="part1.php"><figure class="pic"><img src="Capture 5.png"><figcaption>Check Health</figcaption></figure></td>
</tr>
</table>
</div><br><br><br><br><br>
<div class="box">
<br>
<br>

<b>
<pre style="font-family:Goudy Old Style"><figure class="pic"><img src="logo.png"><figcaption></figcaption></figure>
 The Mission of eHealth-Care is to help 
 patients, physicians, and community hospitals 
 to make appropriate use of information and 
 communication technologies (ICTs) in order 
 to improve access and quality of healthcare 
 delivery and reduce the cost of its management.
</pre>
</b>

<a href="subs/aboutus.html" target="_blanck"><button class="button1"><b>FIND OUT MORE</b></button></a>
</div>

<div class="parallax2"></div>
<div  class="bottom" text="#E0E0E0" link="#E0E0E0">
    
    <center>
    <h1><font color="#D1D1D1" size="7" style="font-family:Goudy Old Style;">For the journey that is life!</font></h1>
    <p>Save your time searching after the best consultants.</p>
    <p><b>MAIL US:&nbsp;&nbsp;&nbsp;&nbsp;</b><a href="ehealthcare@gmail.com">E-Health Care.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><b>CONTACT US:&nbsp;&nbsp;&nbsp;&nbsp;</b>0141-9876543<br></p>

</center>
    
</div>


</body>
</html>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
}

var modal = document.getElementById('newlogin');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modalcontent= document.getElementById('container');
var modalcontent1= document.getElementById('container1');
function displayregister()
{
modalcontent.style.display ="none";
modalcontent1.style.display ="block";	
}
function displaylogin()
{
modalcontent.style.display ="block";
modalcontent1.style.display ="none";	
}

function validate()
{var pass = document.forms["register"]["psw"].value;
var pass1 = document.forms["register"]["rpsw"].value;
if(pass!==pass1)
{
	psw=document.getElementById('psw');
	rpsw=document.getElementById('rpsw');

	psw.value="";
	rpsw.value="";
	psw.style.border="1px solid red";
return false;	
}
}



</script>
