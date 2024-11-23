<?php
$a = $_GET['idx'];
$b = $_POST['userid'];
$c = $_POST['username'];
$d = $_POST['passwd'];
$e = $_POST['email'];
$f = $_POST['tel'];
$g = $_POST['addr'];
include("./db_conn.php");
$sql = "update member set userid='$b', username='$c', passwd='$d', email='$e', tel='$f', addr='$g' where id='$a'";
mysqli_query($conn, $sql);
echo "<script>alert('Updated!');</script>";

?>
<meta http-equiv='refresh' content='0;URL=index.php'>