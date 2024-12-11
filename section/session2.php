<?php

session_start();
//세션 설정
$_SESSION['my2'] = "apply2";
//my2라는 세션을 생성(클라이언트에 저장: my2)

?>

<h1>세션생성</h1>
설정한 세션 내용은 <a href="session_result2.php">여기로</a>