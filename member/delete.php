<?php
// 데이터베이스 연결
include('./db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['idx'];

    $sql = "DELETE FROM member WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('삭제가 완료되었습니다.'); location.href='index.php';</script>";
    } else {
        echo "<script>alert('삭제에 실패했습니다.');</script>";
    }
}

mysqli_close($conn);
?>
<meta http-equiv='refresh' content='0;URL=index.php'>
