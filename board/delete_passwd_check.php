
<?php
include('db_conn.php'); // DB 연결

// 비밀번호 확인 페이지로 이동하기 위해 ID와 비밀번호를 받음
$id = $_GET['id']; // 게시물 ID
$password = $_POST['password']; // 입력된 비밀번호

// 게시물 정보 가져오기
$sql = "SELECT * FROM board_posts WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    // 비밀번호가 일치하는지 확인
    if ($password == $row['password']) {
        // 비밀번호가 일치하면 게시물 삭제
        $delete_sql = "DELETE FROM board_posts WHERE id = $id";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<script>
                    alert('게시물이 삭제되었습니다.');
                    window.location.href = 'list_page.php';
                  </script>";
        } else {
            echo "<script>
                    alert('게시물 삭제에 실패했습니다.');
                    window.location.href = 'list_page.php';
                  </script>";
        }
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

