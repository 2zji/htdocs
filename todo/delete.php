<?php
session_start();

// POST 요청 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST 데이터 유효성 확인
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $id = isset($_POST['idx']) ? $_POST['idx'] : null;

    if (!$password || !$id) {
        echo "<script>alert('비밀번호 또는 ID가 입력되지 않았습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        exit();
    }

    // 데이터베이스 연결
    include('./db_conn.php');

    // SQL Injection 방지
    $id = mysqli_real_escape_string($conn, $id);

    // 사용자 확인
    $sql = "SELECT passwd FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("쿼리 오류: " . mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "<script>alert('사용자를 찾을 수 없습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        exit();
    }

    // 비밀번호 확인 후 삭제
    if ($user['passwd'] === $password) {
        $delete_sql = "DELETE FROM user WHERE id = '$id'";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<script>alert('삭제되었습니다.');</script>";
        } else {
            echo "<script>alert('삭제 실패: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('비밀번호가 잘못되었습니다.');</script>";
    }

    // 디비 연결 종료
    mysqli_close($conn);

    // 페이지 리다이렉트
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    exit();
}
?>
