<html>
<?php
session_start(); 
 ?>
 <head>
   <link rel="stylesheet" href="/E:New folder/Newfolder/public/stylesheets/dashboard.css">
 </head>
   <body>

     <?php
     $host="127.0.0.1";
     $port=20205;
     $sock= socket_create(AF_INET, SOCK_STREAM,0);
     socket_connect($sock,$host,$port);

     $msg=socket_read($sock,1924);
     $msg=trim($msg);
      ?>

    <div class="navbar">
         <a href="index.html" class="logo">SockIM</a>
         <h2>Logout</h2>
         <a href="register.html">Add User</a>
    </div>

    <div class="other">
          <div class="chatBox">
            <h1>Chat Box</h1>
            <p class=""><?php echo @$msg; ?></p>
            <div class="msgBox">
              <form method="post">
                <input type="text" id="msg" name="textMessage">
                <input type="submit" name="btnSend" id="submit" value="send">
              </form>
            </div>
            <?php
                if(isset($_POST['btnSend'])){
                  $msg=$_REQUEST['textMessage'];
                  socket_write($sock,$msg,strlen($msg));
                }
             ?>
          </div>
          <div class="onlineUser">
            <h2>Online User</h2>

          </div>
    </div>

  </body>

</html>
