<?php
// db_conn.php 파일을 포함하여 데이터베이스 연결
include('db_conn.php');

// 폼에서 전송된 데이터 받기
$name = $_POST['name'];
$title = $_POST['title'];
$year = $_POST['year'];
$phone = $_POST['phone'];
$content = $_POST['content'];
$password = $_POST['password'];

// 파일 업로드 처리
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $upload_dir = 'uploads/';
    $uploaded_file = $upload_dir . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploaded_file);
} else {
    $uploaded_file = null;  // 파일이 없으면 NULL로 설정
}

// SQL 쿼리 작성
$sql = "INSERT INTO board_posts (name, title, year, phone, content, password, file)
        VALUES ('$name', '$title', '$year', '$phone', '$content', '$password', '$uploaded_file')";

// 데이터베이스에 게시물 저장
if (mysqli_query($conn, $sql)) {
    echo "새 글이 등록되었습니다.";
} else {
    echo "오류: " . $sql . "<br>" . mysqli_error($conn);
}


// 연결 종료
mysqli_close($conn);

echo "<meta http-equiv = 'refresh' content ='0; URL=list_page.php'>";
?>
