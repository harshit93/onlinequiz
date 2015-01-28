<?php
session_start();
include_once("sql.php");
if(isset($_SESSION['u_id']))
{
$fb_id = $_SESSION['u_id'];
$result = mysqli_query($con,"SELECT * FROM user_login where id= '$fb_id'") or die(mysql_error());//count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

/*if ($count == 0) {
    $url = 'index.php';
    echo "<script type='text/javascript'>
                                        window.location = '" . $url . "'; 
                                        </script>";
} else {*/
    $_SESSION['id'] = $fb_id;
//}
if ($row['day1'] == 1) {
    $newURL="end.php";
 header('Location: '.$newURL);
}
?>
<html lang="en">
    <head>
        <script>
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};

    
        </script>


        <meta charset="utf-8">
        <title>Online Quiz | Quizzitch Cup 2014</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Online wuiz QC2014">
        <meta name="author" content="aaghran" >

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">


    </head>
    <body oncontextmenu="return false" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

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

                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <li><a href="http://quizzitch.quizinc.in">Back to Quizzitch Cup</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>  
        <div class="sidebar ">
            <h3><span class='btn btn-lg btn-primary' id="timer"></span></h3>

        </div>

        <div class="row" style="margin-top: 40px;border-left-width: 15px;padding-left: 200px;padding-top: 50px;">
            <div class="col-md-8 col-md-offset-1 well well-lg">

                <div id="start" class="" style="display: block;overflow-y: auto;max-height: 70% ;">
                    <p>                <br />
                        RULES:<br /> 1. 5 MCQs , for 10 minutes. Answer are submitted automatically after 10 mins.
                        <br />2. Select your choice and submit within that time.
                        <br />3. Whoever answers all the questions correctly wins. In case of ties, it will be resolved by evaluating the least time taken for get all correct answers. 
                        <br />4. The final years of Quizinc hold the final authority in case of any dispute.

                    <center><button id="loading" type="button" class="btn btn-danger btn-lg btn-block" onclick="" style="margin-top: 40px">Loading ....</button></center>
                    <center><button id="start_button" type="button" class="btn btn-danger btn-lg btn-block" onclick="show_quiz()" style="display: none;margin-top: 40px">Start Quiz!</button></center>
                </div>

                <div id="quiz_1" class="" style="display: none; overflow-y: scroll;height: 70% ">
                    <h3>Day 1</h3><hr />
                    <?php
                    $result = mysqli_query($con,"SELECT * FROM questions WHERE day='1' ");
                    $row = array();
                    while ($row[] = mysqli_fetch_array($result)) {
                        
                    }
                   // print_r($row);
                    $blank = false;
                    //echo "\n\n";
                    //$rand_keys = array_rand($row, 5);
                    shuffle($row);
                   // print_r($row);
                    $_SESSION['row']=$row;
                    ?>
                    <form id="quiz_form" name="quiz_form" action="answer.php" method="post">
                        <?php
                        $k=0;
                        $i=0;
                         while($k<5) { 
                            
                            if(!empty($row[$i]['question']))
                            { ?><p> Q <?php echo $k + 1; ?> )
<?php
                                echo $row[$i]['question']; ?></br>



            <?php if($row[$i]['image_name']!=NULL){
            $x=$row[$i]['image_name'];
            ?></br>
             <img src='img/ques/<?php echo $x;?>' style="width:256px;height:256px"> 
            <?php
            } ?></br></br>


                            
                                
                                    <textarea type="text" rows="5" cols="30" name="<?php echo $i ?>"  >
                                    </textarea>
                            

                            <input type="hidden" name="id" value="<?php echo $fb_id; ?> " >
                            <?php

                        $i++;
                        $k++;
                    }
                        else
                            {
                                $i++;
                            }
                            
                    }
                        ?>
                        <input type="submit" value="Submit" class="btn btn-danger btn-lg btn-block" >
                    </form>


                </div>
            </div>
        </div>
    </body>

    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.js"></script>
    
    <script>

                        function show_quiz() {
                            $('#start').fadeOut();
                            $('#quiz_1').fadeIn();
                            setTimeout('Decrement()', 1000);

                        }

                        var mins = 3;  //Set the number of minutes you need
                        var secs = mins * 60;
                        var currentSeconds = 0;
                        var currentMinutes = 0;

                        function Decrement() {
                            currentMinutes = Math.floor(secs / 60);
                            currentSeconds = secs % 60;
                            if (currentSeconds <= 9)
                                currentSeconds = "0" + currentSeconds;
                            secs--;
                            document.getElementById("timer").innerHTML = currentMinutes + ":" + currentSeconds; //Set the element id you need the time put into.
                            if (secs !== -1)
                                setTimeout('Decrement()', 1000);
                            else {
                                alert('Times Up');
                                submitform();
                                return;

                            }
                        }

                        function submitform()
                        {
                            $("#quiz_form").submit();
                        }
                        $('#loading').hide();
                        $('#start_button').show();

    </script>
<?php } 
else
{
     $newURL="index.php";
 header('Location: '.$newURL);

}

?>


