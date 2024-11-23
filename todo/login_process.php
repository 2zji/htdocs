<?php
session_start();
include('./db_conn.php');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$passwd = mysqli_real_escape_string($conn, $_POST['passwd']);

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($passwd, $user['passwd'])) {
    $_SESSION['user_id'] = $user['email'];
    header('Location: todo.php');
} else {
    echo "<script>alert('로그인 정보가 잘못되었습니다.');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}
?>
