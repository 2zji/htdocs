<?php

if((!isset($_COOKIE['userid'])) || !isset($_COOKIE['userpass'])){
    echo"<meta http-equiv = 'refresh' content = '1; url=login.html'>";
    exit;
} else{
    $a = $_COOKIE['userid'];
    echo"<p>Hello.$a";
    echo"<a href = 'logout.php'>로그아웃</a>";
}

?>