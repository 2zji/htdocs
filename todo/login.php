<?php
session_start();

// POST 데이터 확인
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';

    // 입력값 확인
    if (empty($email) || empty($passwd)) {
        $_SESSION['error'] = "이메일과 비밀번호를 입력하세요.";
        header('Location: index.php');
        exit();
    }

    // 데이터베이스 연결
    include('./db_conn.php');

    // 이메일 확인 및 비밀번호 일치 여부 검사
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result || mysqli_num_rows($result) === 0) {
        $_SESSION['error'] = "존재하지 않는 이메일입니다.";
        header('Location: index.php');
        exit();
    }

    $user = mysqli_fetch_assoc($result);

    // 비밀번호 확인
    if ($user['passwd'] !== $passwd) {
        $_SESSION['error'] = "비밀번호가 틀렸습니다.";
        header('Location: index.php');
        exit();
    }

    // 로그인 성공 - 세션 저장
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_name'] = $user['name'];

    echo "<script>alert('로그인 성공!');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=todo_main.html'>";

    mysqli_close($conn);
    exit();
}
?>
