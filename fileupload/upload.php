<?php
$f_name = $_FILES['userfile']['name'];
$f_type = $_FILES['userfile']['type'];
$f_size = $_FILES['userfile']['size'];
$f_tmp = $_FILES['userfile']['tmp_name'];

// echo "name: ".$f_name."<br/>";
// echo "type: ".$f_type."<br/>";
// echo "size: ".$f_size."<br/>";
// echo "tmp_name: ".$f_tmp_name."<br/>";

//업로드 파일을 저장하는 폴더: uploads
//uploads 폴더가 있으면 파일을 업로드하고,
//uploads 폴더가 없으면 폴더를 생성(mkdir)

$uploads = 'upload/';
if(!is_dir($uploads)){
    mkdir($uploads);
}

//서버에 올라가는 최종 파일이름
$upload_file = $uploads.$f_name;

move_uploaded_file($f_tmp, $upload_file);

?>