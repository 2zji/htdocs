<?php
// db_conn.php 파일을 포함하여 데이터베이스 연결
include('db_conn.php');

// 게시물 목록 가져오기
$sql = "SELECT * FROM board_posts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// 게시물 출력
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='post'>";
        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
        echo "<p>작성자: " . htmlspecialchars($row['name']) . "</p>";
        echo "<p>학년: " . htmlspecialchars($row['year']) . " | 전화: " . htmlspecialchars($row['phone']) . "</p>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "<a href='detail_page.php?id=" . $row['id'] . "'>상세보기</a>";
        echo "</div>";
    }
} else {
    echo "게시물이 없습니다.";
}

// 연결 종료
mysqli_close($conn);
?>
