<?php
include('db_conn.php'); // DB 연결

// 폼에서 수정된 데이터 받기
$id = $_POST['id'];
$name = $_POST['name'];
$title = $_POST['title'];
$year = $_POST['year'];
$phone = $_POST['phone'];
$content = $_POST['content'];
$file = $_FILES['file']['name'];

// 파일 업로드 처리
if ($file) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $file = $target_file;
}

// 게시물 수정 SQL 쿼리
$sql = "UPDATE board_posts SET 
            name = '$name', 
            title = '$title', 
            year = '$year', 
            phone = '$phone', 
            content = '$content', 
            file = '$file' 
        WHERE id = $id";

// 쿼리 실행
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('게시물이 수정되었습니다.');
            window.location.href = 'view_post.php?id=$id'; // 수정된 게시물 보기
          </script>";
} else {
    echo "<script>
            alert('게시물 수정에 실패했습니다.');
            window.location.href = 'list_page.php'; // 목록으로 이동
          </script>";
}

// 연결 종료
mysqli_close($conn);
?>
