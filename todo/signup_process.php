<?php
session_start();

// 데이터베이스 연결
include('./db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // 비밀번호 해싱
    $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);

    // 사용자 이메일이 이미 등록되어 있는지 확인
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('이미 사용 중인 이메일입니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=signup.php'>";
        exit();
    }

    // 사용자 정보 추가
    $sql = "INSERT INTO user (email, passwd, name) VALUES ('$email', '$hashed_passwd', '$name')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('회원가입이 완료되었습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    } else {
        echo "<script>alert('회원가입에 실패했습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=signup.php'>";
    }

    // 데이터베이스 연결 종료
    mysqli_close($conn);
}
?>
