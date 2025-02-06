<?php
   include("config.php");
   session_start();
   $error='';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $sql = "SELECT * FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";

      $result = mysqli_query($db,$sql);      
      $row = mysqli_num_rows($result);      
      $count = mysqli_num_rows($result);

      if($count == 1) {
	  
         // session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      } else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<head>
   <title>Login Page</title>
   <link rel="stylesheet" href="Login.css">
 
</head>
<body >
   <div id="test">
      <div id="container">
         <div id="login"><h1>Login</h1></div>
         <div style = "margin:30px">
            <form action = "" method = "post">
               <label id="UserName">UserName </label><input id="text_input" type = "text" name = "username" class = "box"/><br /><br />
               <label id="Password">Password </label><input id="password_input" type = "password" name = "password" class = "box" /><br/><br />
               <input id="btn" type="submit" value="Submit" /><br />
            </form>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
         </div>
      </div>
   </div>
</body>
</html>