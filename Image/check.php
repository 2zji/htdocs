<?php
    $a=$_POST['hobby'];
    var_dump($a);

    //사용자가 체크한 값 가져오기
    for($i = 0; $i<count($_POST['hobby']); $i++){
        echo $_POST['hobby'][$i];
    }


?>