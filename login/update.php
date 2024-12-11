<?php
$a = $_GET['idx'];
$b = $_POST['userid'];
$c = $_POST['passwd'];
//DB접속
$conn = mysqli_connect('localhost', 'root', '111111', 'testdb');

//$sql = update
$sql = "update login set userid='$b', passwd='$c' where id = $a";

//쿼리 날리기
mysqli_query($conn, $sql);

//js로 updated!! 출력
echo"<script>alert('Updated!!');</script>";

//DB종료
mysqli_close($conn);

//meta태그로 index.php로 화면전환
?>

<meta http-equiv='refresh' content = "0; URL=index.php">