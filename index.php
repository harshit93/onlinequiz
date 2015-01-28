<?php
session_start();
include_once("sql.php");
?>
<html lang="en">
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
                <span style="font-size: 18px;text-align: center">For all those laggards who find it painful to get themselves to quizzing arena, here's Quiz-from-hostel-or-home sorts!
                    <br />Contest starts tonight at 9:00 pm upto 11:00 pm for the next three days.</span>
                <br />
                <br />
                RULES:<br /> 1. 5 randomly generated MCQs , for 10 minutes.
                <br />2. Select your choice and submit within that time.
                <br />3. Whoever answers all the questions correctly wins. In case of ties, it will be resolved by evaluating the least time taken for get all correct answers. 
                <br />4. The final years of Quizinc hold the final authority in case of any dispute.
                <br /><center><?php
                    // Remember to copy files from the SDK's src/ directory to a
                    // directory in your application on the server, such as php-sdk/
                    /*require_once('facebook.php');

                    $config = array(
                        'appId' => '454130488043383',
                        'secret' => '445eac1ce991a40894a0d3668a745407',
                        'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
                    );

                    $facebook = new Facebook($config);
                    $user_id = $facebook->getUser();
                    ?>
                    <html>
                        <head></head>
                        <body>

                            <?php
                            $fb_id = 0;
                            if ($user_id) {

                                // We have a user ID, so probably a logged in user.
                                // If not, we'll get an exception, which we handle below.
                                try {

                                    $user_profile = $facebook->api('/me', 'GET');
                                    //echo "Name: " . $user_profile['name'];
                                    //print_r($user_profile);
                                    $ret_obj = $facebook->api('/me/feed', 'POST', array(
                                        'link' => 'http://quizzitch.quizinc.in/online',
                                        'message' => "Hey, I'm playing the online quiz at Quizzitch Cup 2015 @ NIT Durgapur. Quizzitch Cup events tomorrow :  Linquizzitor (Tech Quiz) at 4:30pm ; Quizzitch Cup (General Quiz) at 9pm  Venue : Lord's NIT Durgapur ",
                                        'picture' => "http://quizzitch.quizinc.in/img/icon.png",
                                         'description' => "For all those laggards who find it painful to get themselves to quizzing arena, here's Quiz-from-hostel-or-home sorts!
                    <br />Contest starts tonight at 9:00 pm upto 11:00 pm for the next three days.",
                                    ));
                                    //echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';
                                    // Give the user a logout link 
                                    //echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
                                    $json = $_POST['json'];
                                    $username = $user_profile['username'];
                                    $name = $user_profile['name'];
                                    $fb_id = $user_profile['id'];
                                    //echo 'fb' . $fb_id;

                                    $result = mysql_query("SELECT fb_id FROM user where fb_id= '$fb_id'") or die(mysql_error());
                                    $count = mysql_num_rows($result);
                                    if ($count > 0) {
                                        $_SESSION['u_id'] = $fb_id;
                                        //echo "old user";

                                        $url = 'start.php?';
                                        echo "<script type='text/javascript'>
                                             window.location = '" . $url . "';
                                            </script>";
                                    } else {
                                        mysql_query("INSERT INTO user (username, name, fb_id, score, day1, day2, day3) 
 		VALUES('$username','$name', '$fb_id', '0', '0', '0', '0' ) ") or die(mysql_error());
                                        $_SESSION['u_id'] = $fb_id;
                                        //echo "new user";
                                        $url = 'start.php?p';
                                        echo "<script type='text/javascript'>
                                        window.location = '" . $url . "'; 
                                        </script>";
                                    }
                                } catch (FacebookApiException $e) {
                                    // If the user is logged out, you can have a 
                                    // user ID even though the access token is invalid.
                                    // In this case, we'll get an exception, so we'll
                                    // just ask the user to login again here.
                                    $login_url = $facebook->getLoginUrl(array(
                                        'scope' => 'publish_stream'
                                    ));

                                    echo ' <a class="btn btn-primary btn-lg btn-block login" href="' . $login_url . '" style="margin-top:10px;">Login with Facebook</a>';
                                    error_log($e->getType());
                                    error_log($e->getMessage());
                                }
                            } else {

                                // No user, print a link for the user to login
                                $login_url = $facebook->getLoginUrl(array('scope' => 'publish_stream'));
*/
?>

                                <a class="btn btn-danger"  href=" user_register.php"> Register </a>
                                <a class="btn btn-danger"  href=" user_Login.php"> Login </a>
                            
                             
            
        
    </body>
</html> 
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.js"></script>
<script>
//alert("Quizzitch Cup events tomorrow : \n Linquizzitor (Tech Quiz) at 4:30pm \n Quizzitch Cup (General Quiz) at 9pm \n Venue : Lord's NIT Durgapur ");


</script>