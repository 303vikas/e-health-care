<?php
session_start();
if(!$_SESSION['username'])
die('You must be logged in');


else
{ 
  $myname= $_SESSION['username'];
  $connect=mysqli_connect('localhost','root','','weblogin') or die('database error');  // server,id,pass,database
  $query=mysqli_query($connect,"SELECT * FROM users WHERE username='$myname' "  );
  $row =mysqli_fetch_assoc($query);
  $dbmessage= $row['message'];
}


?>

<style>
#header {
    background-color:green;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:100px;
    float:left;
    padding:5px;	      
}
#section {
    width:300px;
    float:left;
    padding:10px;	 	 
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

<div id="header">
<h1><b>Welcome</h1> 
<p style="text-align:right"><?php echo date(' l  F  jS\ Y' );?>
</div>


<div id="nav">
<a href='Welcome.php' style='color:green' >Home<br></a>
<a href =inbox.php >Inbox</a><br>
<a href ='sendmail.php'>Send a mail</a>
</div>

<div id="section">
<h2>Inbox</h2>
<form action='?' method='POST'>
<input type='submit' name='clear' value='Clear Messages'>
</form>
<pre>

<?php 
if(isset($_POST['clear']))
{ $myname=$_SESSION['username'];
  $connect=mysqli_connect('localhost','root','','weblogin') or die('database error');  // server,id,pass,database
  $query=mysqli_query($connect,"SELECT * FROM users WHERE username='$myname' ");
  $row =mysqli_fetch_assoc($query);
  
  $sql = "  UPDATE users SET message =('')  WHERE username='$myname' ";
  $check=mysqli_query($connect,$sql); //basically in mysqli_query first parameter is connection,and the the sql command

	if($check==TRUE)
	$dbmessage= $row['message'];

	else die('Error uploading profile pic');
  }
else
print($dbmessage);
 

 ?>
</pre>
</div>

<div id="footer">
Copyright © localhost
</div>

</body>
</head>
</html>