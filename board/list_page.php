<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시물 목록</title>
    <link rel="stylesheet" href="css/list_page.css">
</head>

<body>
    <div class="container">
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
                echo "<a href='detail_page.php?id=" . $row['id'] . "'>상세보기</a>";
                echo "</div>";
            }
        } else {
            echo "게시물이 없습니다.";
        }

        // 연결 종료
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>