<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 데이터베이스 연결
    include('./db_conn.php');

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // 비밀번호 해시 처리
    $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);

    // 회원가입 쿼리
    $sql = "INSERT INTO todo_user (email, passwd, name) VALUES ('$email', '$hashed_passwd', '$name')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('회원가입이 완료되었습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>"; // 로그인 페이지로 리다이렉트
        exit();
    } else {
        echo "<script>alert('회원가입 실패: " . mysqli_error($conn) . "');</script>";
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
    <title>회원가입</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <form method="POST" action="signup.php">
        <h2>회원가입</h2>
        <label for="email">이메일:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="passwd">비밀번호:</label>
        <input type="password" id="passwd" name="passwd" required><br><br>

        <label for="name">이름:</label>
        <input type="text" id="name" name="name" required><br><br>

        <input type="submit" value="회원가입">
    </form>
</body>
</html>
