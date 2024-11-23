<?php
session_start();

// 로그인 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 데이터베이스 연결
    include('./db_conn.php');

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);

    // 비밀번호 확인 쿼리
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // 비밀번호 확인
        if (password_verify($passwd, $user['passwd'])) {
            // 로그인 성공 시
            $_SESSION['userid'] = $user['email']; // 세션에 이메일 저장

            // 로그인 성공 시 todo.php로 리다이렉트
            header("Location: todo.php");
            exit();
        } else {
            echo "<script>alert('비밀번호가 틀렸습니다.');</script>";
        }
    } else {
        echo "<script>alert('이메일을 확인하세요.');</script>";
    }

    // 데이터베이스 연결 종료
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>로그인</h2>

    <form method="POST" action="index.php">
        <label for="email">이메일:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="passwd">비밀번호:</label>
        <input type="password" id="passwd" name="passwd" required><br><br>

        <input type="submit" value="로그인">
    </form>

    <br>
    
    <a href="signup.php">회원가입</a>
</body>
</html>
