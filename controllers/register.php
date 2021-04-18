<?php
require models/config.php ;

if(isset(['submit']))
{
  $userName=$_POST['fname'];
  $lName=$_POST['lname'];
  $email=$_POST['email'];
  $password=$_POST['psw'];
  $sql=INSERT INTO registerForm(fname,lname,email.psw) VALUES('fname','lname','email','psw');
  mysql_query($sql);
}
 ?>
