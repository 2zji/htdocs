<?php
//idx값 가져오기
$a = $_GET['idx'];

//db접속
$conn = mysqli_connect('localhost', 'root', '111111', 'testdb');

//$sql=
$sql = "select *from login where id=$a";

//쿼리 날리기
$result = mysqli_query($conn, $sql);
$re = mysqli_fetch_row($result);

//종료
mysqli_close($conn);
?>
<form method="post" action="update.php?idx=<?php echo $re[0] ?>">
    <table border>
        <tr>
            <td>번호</td>
            <td><input type="text" name="id" value="<?php echo $re[0]?>" disabled></td>
        </tr>
        <tr>
            <td>아이디</td>
            <td><input type="text" name="userid" value="<?php echo $re[1]?>"></td>
        </tr>
        <tr>
            <td>비밀번호</td>
            <td><input type="text" name="passwd" value="<?php echo $re[2]?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">수정완료</button></td>
        </tr>
    </table>
</form>