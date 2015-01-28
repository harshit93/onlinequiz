<!DOCTYPE HTML> 
<?php
session_start();
include_once("sql.php");
?>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<head>
        <meta charset="utf-8">
        <title>Online Quiz | Quizzitch Cup 2015</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Camping in the woods.">
        <meta name="author" content="aaghran" >

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">


    </head>
    <body>

        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Online Quiz</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="#">Back to Quizzitch Cup</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>  
        <div class="sidebar ">
            <br /><div id="timer" class="span3 timer pull-right btn-danger btn" style= "display: none;font-size:15; top:10%; right:20%" > </div>


        </div>

        <div class="row" style="margin-top: 40px;border-left-width: 15px;padding-left: 200px;padding-top: 50px;">
            <div class="col-md-8 col-md-offset-1 well well-lg">
                <span style="font-size: 18px;text-align: center"> 

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $passwordErr = "";
$name = $email = $gender = $comment = $password= $password1 = "";
$flag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
     
   if (empty($_POST["password"])) {
     $passwordErr = "Password reqd.";
   } else {
     $password1 = test_input($_POST["password"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     $password=md5($password1);
     }

     if (empty($_POST["repassword"]) || $_POST["repassword"]!=$password1) {
     echo "Does not Match!";
   } else {
     $flag=1;
     }
   }

 if($flag==1)
 {
 	$sql="insert into user_login(name,username,password) values ('$name','$email','$password')";

// Execute query
if (mysqli_query($con,$sql)) {
 echo "Success";
 $sql="select id from user_login where username='$email'";
$result=mysqli_query($con,$sql);
$count = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$_SESSION['u_id']=$row['id'];
echo $_SESSION['u_id'];
$_SESSION['name']=$name;

 $newURL="user_login.php";
 header('Location: '.$newURL);
}

 }
 


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Login Details</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Password: <input type="password" name="password">
   <span class="error"></span>
   <br><br>
   Re-enter Password: <input type="password" name="repassword">
   <span class="error"></span>
   <br><br>
   
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php

//$newURL="start.php";
//header('Location: '.$newURL);
?>
</body>


<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.js"></script>
<script>
//alert("Quizzitch Cup events tomorrow : \n Linquizzitor (Tech Quiz) at 4:30pm \n Quizzitch Cup (General Quiz) at 9pm \n Venue : Lord's NIT Durgapur ");


</script>
</HTML>