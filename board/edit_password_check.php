<?php
include('db_conn.php'); // DB 연결

// 폼에서 전달된 데이터 받기
$id = $_POST['id']; // 게시물 ID
$password = $_POST['password']; // 입력된 비밀번호

// 게시물 정보 가져오기
$sql = "SELECT * FROM board_posts WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    // 비밀번호가 일치하는지 확인
    if ($password == $row['password']) { // 평문 비밀번호 비교
        // 비밀번호가 일치하면 수정 또는 삭제 페이지로 리디렉션
        // 수정 페이지로 이동 (수정할 게시물 ID 전달)
        header("Location: edit_post.php?id=$id");
        exit();
    } else {
        // 비밀번호가 일치하지 않으면 에러 메시지
        echo "<script>
                alert('비밀번호가 다릅니다.');
                window.location.href = 'list_page.php';
              </script>";
    }
} else {
    echo "<script>
            alert('게시물이 존재하지 않습니다.');
            window.location.href = 'list_page.php';
          </script>";
}

// 연결 종료
mysqli_close($conn);
?>
