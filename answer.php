<?php
session_start();
include_once("sql.php");
$id = $_SESSION['u_id'];
//$user=$_SESSION['user'];
$row=$_SESSION['row'];
$arr=array();
$arr=$_POST;
$i=0;
$k=0;
//print_r($arr);
$sql="insert into answers(user_id) values ('$id')";
        mysqli_query($con,$sql);
        

while ($k<5)
{

    if (!empty($arr[$i])){
        $ans = $arr[$i];
        if(!empty($row[$i]['id'])){
                $x="q".$row[$i]['id'];    
                $sql="update answers set $x='$ans' where user_id='$id'";
               // echo $sql;
                mysqli_query($con,$sql);
                    
                $k++;
                $i++;
        }
        else
            $i++;
    }
    else
        $k++;

}
/*if (!empty($_POST["ans0"])){
$ans1 = $_POST['ans0'];
if(!empty($row[$i]['id'])){
$x="q".$row[$i]['id'];    
$sql="update answers set user_id='$id', $x='$ans1'";
mysqli_query($con,$sql);
}
}
else 
$ans1="x";
if (!empty($_POST["ans1"]))
$ans2 = $_POST['ans1'];
else 
$ans2="x";
if (!empty($_POST["ans2"]))
$ans3 = $_POST['ans2'];
else 
$ans3="x";
if (!empty($_POST["ans3"]))
$ans4 = $_POST['ans3'];
else 
$ans4="x";
if (!empty($_POST["ans4"]))
$ans5 = $_POST['ans4'];
else 
$ans5="x";
//echo $ans1. " ".$ans2." ".$ans3. " ".$ans4 ;
$count = 0;
$score = 0;
*/
/*$result = mysqli_query($con,"SELECT ans FROM questions where day='1'");
$sol = array();
/*while ($row = mysqli_fetch_array($result)) {
	$sol[$count++]=$row['ans'];
	$c=$count-1;
	//echo $sol[$c];
	//cho $row['ans'];
}

$sol=$_SESSION['row'];

//$tok = explode("-", $ans1);
//echo $tok['1']."            ".$tok['0'];
if ($sol[0]['ans'] == $ans1)
    $score+=10;
//else
//    echo "wrong";
//$tok = explode("-", $ans2);
if ($sol[1]['ans'] == $ans2)
    $score+=10;
//else
//    echo "wrong";
//$tok = explode("-", $ans3);
if ($sol[2]['ans'] == $ans3)
    $score+=10;
//else
//    echo "wrong";
//$tok = explode("-", $ans4);
//echo $sol[3]."        ".$ans4;
if ($sol[3]['ans'] == $ans4)
    $score+=10;
//else
//    echo "wrong";
//$tok = explode("-", $ans5);
if ($sol[4]['ans'] == $ans5)
    $score+=10;
//else
//    echo "wrong";
//echo $score;
$score2=$score;
//echo $score;


$result = mysqli_query($con,"SELECT score FROM user_login WHERE id='$_SESSION[u_id]'");
$count = mysqli_num_rows($result);
if ($count == 0) {
 //   echo "error";
}
$row = mysqli_fetch_array($result);
$score += $row['score'];

*/
$result = mysqli_query($con,"UPDATE user_login SET day1='1' WHERE id='$id'")
or die(mysqli_error());

$url = 'end.php';
echo "<script type='text/javascript'>
                                        window.location = '" . $url . "'; 
                                        </script>";


?>
