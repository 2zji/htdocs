<?php
session_start();

// 세션 데이터를 모두 삭제
session_unset();

// 세션 종료
session_destroy();

// 로그인 페이지로 리다이렉트
header("Location: index.php");
exit();
?>
