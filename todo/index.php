<?php
session_start();

// 로그인 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 데이터베이스 연결
    include('./db_conn.php');

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = $_POST['passwd']; // 비밀번호는 해싱하지 않으므로 따로 처리하지 않음

    // 사용자 정보 가져오기
    $sql = "SELECT * FROM todo_user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // 비밀번호 검증
        if (password_verify($passwd, $user['passwd'])) {
            // 세션에 사용자 정보 저장
            $_SESSION['userid'] = $user['id']; // 사용자 ID 저장
            $_SESSION['username'] = $user['name']; // 사용자 이름 저장

            // 로그인 성공 시 todo.php로 이동
            header("Location: todo.php");
            exit();
        } else {
            echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
        }
    } else {
        echo "<script>alert('등록되지 않은 이메일입니다.');</script>";
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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
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
    </div>
</body>
</html>
