
<?php
//번호 가져오기
$a = $_GET['idx'];
//디비접속
include("./db_conn.php");
//$sql
$sql = "select * from member where id=$a;";
//쿼리 날리기 
 $result =mysqli_query($conn, $sql);
 $re = mysqli_fetch_row($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<link rel="stylesheet" href="css/main.css">
<body>
<form method="post" action="update.php?idx=<?php echo $re[0]; ?>" class="container mt-5">
        <table class="table table-bordered">
        <tr><td>번호</td><td><input type="text" name="id" value="<?php echo $re[0]; ?>" disabled></td></tr>
        <tr><td>아이디</td><td><input type="text" name="userid" value="<?php echo $re[1]; ?>"></td></tr>
        <tr><td>이름</td><td><input type="text" name="username" value="<?php echo $re[2]; ?>"></td></tr>
        <tr><td>비밀번호</td><td><input type="text" name="passwd" value="<?php echo $re[3]; ?>"></td></tr>
        <tr><td>이메일</td><td><input type="text" name="email" value="<?php echo $re[4]; ?>"></td></tr>
        <tr><td>전화번호</td><td><input type="text" name="tel" value="<?php echo $re[5]; ?>"></td></tr>
        <tr><td>주소</td><td><input type="text" name="addr" value="<?php echo $re[6]; ?>"></td></tr>
        <tr><td>가입 날짜</td><td><input type="text" name="regDate" value="<?php echo $re[7]; ?>" disabled></td></tr>
        <tr><td colspan = "2"><button type="submit" class="btn btn-primary btn-lg"> 수정</button>
    </table>
</form>