<?php
require models/config.php ;

if(isset(['submit']))
{
  $userName=$_POST['fname'];

  $password=$_POST['psw'];
}

  $sql="SELECT psw from loginForm where fname='".$fname."'";
  $result=mysql_query($sql);
  if($result==$password)
  {
  session_start();
  }
  else{
    $r= echo "Login failed";
  }
}
 ?>
