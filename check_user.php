<?php
session_start();
include_once("sql.php");
$json = $_POST['json'];
$username = $json['username'];
$name = $json['name'];
$fb_id = $json['id'];
echo 'fb' . $fb_id;

$result = mysql_query("SELECT fb_id FROM user where fb_id= '$fb_id'") or die(mysql_error());
$count = mysql_num_rows($result);
if ($count > 0) {
    $_SESSION['u_id'] = $fb_id;
    echo "old user";
} else {
    mysql_query("INSERT INTO user (username, name, fb_id, score, day1, day2, day3) 
 		VALUES('$username','$name', '$fb_id', '0', '0', '0', '0' ) ") or die(mysql_error());
    $_SESSION['u_id'] = $fb_id;
    echo "new user";
}
echo '<br /> Session'.$_SESSION['u_id'] ;
?>
