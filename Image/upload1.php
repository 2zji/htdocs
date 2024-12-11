<?php

    //1. db접속
    include('./db_conn.php');

    $f_name = $_FILES['userfile']['name'];
    $f_tmp_name = $_FILES['userfile']['tmp_name'];
    $f_type = $_FILES['userfile']['type'];

    $img_info=getimagesize($f_tmp_name);

    echo "width" . $img_info[0];
    echo "height" . $img_info[1];
    echo "type" . $img_info[2];
    echo "aa" . $img_info[3];

    $file = addslashes(file_get_contents($f_tmp_name));
    echo $file;

//2. $sql=쿼리  사용 insert
    $sql = "INSERT INTO img1(img_blob) VALUES ('$file')";


//3. 쿼리 날리고
    $result = mysqli_query($conn, $sql);

// 연결 종료
   mysqli_close($conn);

?>
