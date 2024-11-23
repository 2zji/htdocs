<?php
//사용자가 입력한 값을 member테이블에 insert

//1. 사용자 입력 값 가져오기($_POST)
//$a = $_POST['id'];
$a = $_POST['userid'];
$b = $_POST['username'];
$c = $_POST['passwd'];
$d = $_POST['email'];
$e = $_POST['tel'];
$f = $_POST['addr'];

//2. db접속 db_conn.php
include('./db_corn.php');

//*날짜 자동입력
$now_date = date('Y-m-d');

//3. $sql = insert    values('', -----------------,'$now_date');
$sql = "insert into member(userid, username, passwd, email, tel, addr, regDate) values('$a', '$b', '$c', '$d', '$e', '$f', '$now_date')";

//4. 쿼리 날리기
mysqli_query($conn, $sql);

//js로 가입되었습니다. 출력
echo "<script>alert('가입되었습니다.');</script>";

//5. 종료
mysqli_close($conn);

?>
<meta http-equiv='refresh' content = "0; URL=list.php">