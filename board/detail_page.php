<?php
// db_conn.php 파일을 포함하여 데이터베이스 연결
include('db_conn.php');

// 게시물 ID 받기
$id = $_GET['id'];

// 게시물 상세정보 가져오기
$sql = "SELECT * FROM board_posts WHERE id = $id";
$result = mysqli_query($conn, $sql);

// 게시물이 존재하면 출력
if ($row = mysqli_fetch_assoc($result)) {
    echo "<h1>" . htmlspecialchars($row['title']) . "</h1>";
    echo "<p>작성자: " . htmlspecialchars($row['name']) . "</p>";
    echo "<p>학년: " . htmlspecialchars($row['year']) . " | 전화: " . htmlspecialchars($row['phone']) . "</p>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
    echo "<p>첨부파일: <a href='" . htmlspecialchars($row['file']) . "'>파일 보기</a></p>";
} else {
    echo "해당 게시물이 존재하지 않습니다.";
}

// 연결 종료
mysqli_close($conn);
?>
