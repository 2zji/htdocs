<?php
//up디렉토리가 없을 시 만들기

$uploads = 'up/';
if(!is_dir($uploads)){
    mkdir($uploads);
}

for($i=0;$i<count($_FILES['userfile']['name']); $i++){
    //파일 이름을 완벽하게 연결
        //서버 디렉토리.파일이름
        $upload_file = $uploads.$_FILES['userfile']['name'][$i];

    //move_uploaded_file이용해서 이동
    move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $upload_file); 
}

echo "Uploaded!!";

?>