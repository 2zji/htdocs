<?php
//이미지 경로 db에 저장
//업로드 폴더: uploads

    //db접속
    include('./db_conn.php');

    $f_name = $_FILES['userfile']['name'];

    $uploads = 'uploads/';
    $upload_file = $uploads.$_FILES['userfile']['name'];
    echo "path".$upload_file;
    move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file);


    //2. 이미지가 있는 경로를 테이블에 추가(insert)
    $sql = "INSERT INTO img2(img_name, img_path) VALUES ('$f_name', '$upload_file')";

    //mysqli_query()
    mysqli_query($conn, $sql);

    //닫기
    mysqli_close($conn);

?>

<a href="show.php">디비에 있는 이미지 불러오기</a>