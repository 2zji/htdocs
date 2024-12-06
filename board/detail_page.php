<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시물 상세보기</title>
    <link rel="stylesheet" href="css/detail_page.css">
</head>

<body>
    <div class="container">
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

            // 첨부파일 처리
            $file = htmlspecialchars($row['file']);
            $file_ext = pathinfo($file, PATHINFO_EXTENSION); // 파일 확장자 추출
            $image_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp']; // 이미지 확장자 리스트

            if (in_array(strtolower($file_ext), $image_exts)) {
                // 이미지 파일일 경우 화면에 출력
                echo "<div class='image-container'><img src='$file' alt='첨부 이미지'></div>";
            } else {
                // 이미지가 아닐 경우 링크 제공
                echo "<p>첨부파일: <a href='$file'>파일 보기</a></p>";
            }
        } else {
            echo "해당 게시물이 존재하지 않습니다.";
        }

        // 연결 종료
        mysqli_close($conn);
        ?>
        <div class="button-container">
            <a href="write_page.html" class="button">새글 작성</a>
            <a href="edit_page.php?id=<?php echo $id; ?>" class="button">글 수정</a>
            <a href="delete.php?id=<?php echo $id; ?>" class="button" onclick="return confirm('정말 삭제하시겠습니까?');">글 삭제</a>
            <a href="list_page.php" class="button">목록으로</a>
        </div>
    </div>
</body>

</html>
