<?php
include("include/header.php");
require_once './library/config.php';
//require_once './library/functions.php';

$errorMessage = '&nbsp;';

if(isset($_POST['btnreg']))
{
	
 session_start();
 $name = $_POST['txtUserName']; 			// giving name variable value from input home.php
 $pass = $_POST['txtPassword'];             // isset($_POST['data']) -taking empty input also?
 $utype=$_POST['utype'];
 $add=$_POST['txtAdd'];
 $mob=$_POST['txtMob'];
 $email=$_POST['email'];
 $date=date('Y/m/d');
  
 if($name && $pass && $utype=="customer" && $add && $mob && $email)
{

$query=mysqli_query($connect,"SELECT * from users WHERE uemail='$email' ");  //variable query the just a shortcut for the command after =, command is important and is working without variable also 
$numrows = $query->num_rows;
if($numrows!=0)
{
	$errorMessage='You are already registered to our website';
	exit;
	}

$query=mysqli_query($connect,"SELECT * FROM users WHERE uname='$name' ");  //variable query the just a shortcut for the command after =, command is important and is working without variable also 
$numrows = $query->num_rows;

if($numrows!=0)
{
	$errorMessage='Username Not avaliable Try different username';
	exit;
	}

if($numrows==0)
{

$sql   = "INSERT INTO users (uname, upass, uaddress, uemail, umobile, udate)
		  VALUES ('$name', '$pass', '$add','$email',$mob,'$date')";

//$sql = " INSERT INTO `users` (`uname`, `upass`, `uaddress`, `umobile`, `uemail`, `udate`) 
//VALUES ('$name','$pass','$add','$mob','$email','$date')";

$check=mysqli_query($connect,$sql);

if($check==TRUE)
{
$errorMessage="Congrats users $name is successfully registered";
}

else
die('Error in inserting values to database');

}

else
die("please provide all the required fields");

}

}

?>


<style>
<link href="include/common.css" rel="stylesheet" type="text/css">

</style>

<body>
<div id="regsterdiv">

<body>
<br/><br/>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="graybox">
 <tr> 
  <td valign="top">
   <table width="100%" border="0" cellspacing="0" cellpadding="20" align="center">
    <tr> 
     <td class="contentArea"> 
	 <form method="post" name="reg" id="idreg" action="?" onsubmit="return validatereg();">
       <p>&nbsp;</p>
       <table width="600" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#336699" class="entryTable">
        <tr id="entryTableHeader"> 
         <td style="text-align:center;">Register Now</td>
        </tr>
        <tr> 
         <td class="contentArea"> 
		 <div class="errorMessage" align="center"><?php echo "";/* echo $errorMessage; */?></div>
		 
		  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="text">
           <tr align="center"> 
		   <td colspan="2"><div align="center"><?php echo$errorMessage?></div></td>
            <td colspan="2"><div align="right"><a href="home.php">Back</a></div></td>
           </tr>
           <tr class="entryTable">
             <td class="label">&nbsp;User Name</td>
             <td class="content"><input name="txtUserName" type="text" class="box" id="txtUserName" size="30"  maxlength="20"  autofocus required></td>
           </tr>
           <tr class="entryTable">
             <td class="label">&nbsp;Password</td>
             <td class="content"><input name="txtPassword" type="password" class="box" id="txtPassword" value="" required size="30" maxlength="20" /></td>
           </tr>
           <tr class="entryTable">
             <td class="label"> &nbsp;User Type </td>
             <td class="content"><select name="utype" class="box">
               <option value="customer">&nbsp;&nbsp; Customer &nbsp;</option>
               </select>			  </td>
           </tr>
           <tr class="entryTable">
             <td valign="top" class="label">&nbsp;Address.</td>
             <td class="content"><textarea name="txtAdd" cols="40" rows="4" class="box" required id="txtAdd"></textarea></td>
           </tr>
           <tr class="entryTable">
             <td class="label">&nbsp;Mobile No. </td>
             <td class="content"><input name="txtMob" type="text" class="box" id="txtMob" value="" required size="30" maxlength="20" /></td>
           </tr>
		   
           <tr class="entryTable">
             <td class="label"> &nbsp;E-mail</td>
            <td class="content"><input name="email" type="text" class="box" id="Email" value="" required size="30" maxlength="60"></td>
           </tr>
           
           <tr>
             <td width="200">&nbsp;</td>
             <td width="372">&nbsp;</td>
           </tr>
           <tr> 
            <td>&nbsp;</td>
            <td><input name="btnreg" type="submit" id="btnreg" style="font-size:14px;color:#0066FF;padding:5px 8px;"  value=" Signup " ></td>
           </tr>
          </table></td>
        </tr>
       </table>
       <p>&nbsp;</p>
      </form></td>
    </tr>
   </table></td>
 </tr>
</table>
<p>&nbsp;</p>
</body>

<script src="library/common.jss"></script>
