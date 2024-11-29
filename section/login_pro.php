<?php

$id = "kim";
$pass = "1111";

$userid = $_POST['userid'];
$userpass = $_POST['userpass'];

//아이디
if(($userid != "kim") || ($userpass != "1111")){
    echo"<script>alert('아이디 또는 비밀번호가 다릅니다.');
    history.go(-1);";
} else{
    setcookie('userid', $userid, time() + 3600);
    setcookie('userpass', $userpass, time()+3600);
    echo"<meta http-equiv = 'refresh' content = '1; url=index.php'>";
}

?>