<?php
session_start();
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['register_btn'])){
//session_start();
    $username = $_POST['username'];
    $email  = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if($password==$password2){
        $password=md5($password);
        $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
        mysqli_query($db,$sql);
        $_SESSION['message']="You have Registered Successfully";
        $_SESSION['username']=$username;
        header("location: login.php");  
    }
    else{
        $_SESSION['message']="The Two pasword do not match";
        
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style1.css">

        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor=lightblue>
          <div class="ab">
    <a class="abc" href="">Links</a>
<a class="abc" href="register.php">Register</a>
    <a class="abc" href="">Services</a>         
          <a class="abc" href="About.html">About</a>      
        <a class="abc" href="index.php">Home</a>

  </div> 

<div class="header">
    <h1>REGISTER AIR MAharashtra</h1>
    </div>
     <?php 
    if(isset($_SESSION['message'])){
    echo "<div id='error_msg'>"
        .$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    ?>
<form method="post" action="register.php">
    <table>
    <tr>
        <td>Username:</td>
        <td><input type="text" name="username" class="textInput"</td>
        </tr>
        <tr>
        <td>Email id::</td>
        <td><input type="email" name="email" class="textInput"</td>
        </tr>
    <tr>
        <td>Password:</td>
        <td><input type="password" name="password" class="textInput"</td>
        </tr>
        <tr>
        <td>Confirm Password:</td>
        <td><input type="password" name="password2" class="textInput"</td>
        </tr>
    <tr>
        <td></td>
        <td><input type="submit" class="button1" name="register_btn"  </div> </td>
        </tr>
        
    </table>
    </form><center>
    <h3>Already Registered then </h3> <a href="login.php"><h3>Login</h3></a>
    </center>
</body>
</html>