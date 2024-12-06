<?php
include('db_conn.php'); // DB 연결

// 게시물 ID 받기
$id = $_GET['id'];

// 게시물 정보 가져오기
$sql = "SELECT * FROM board_posts WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    // 게시물 정보 불러오기
    $title = $row['title'];
    $content = $row['content'];
    $name = $row['name'];
    $year = $row['year'];
    $phone = $row['phone'];
    $file = $row['file'];
} else {
    echo "<script>
            alert('게시물을 찾을 수 없습니다.');
            window.location.href = 'list_posts.php'; // 목록으로 돌아가기
          </script>";
    exit();
}

// 연결 종료
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시물 수정</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>게시물 수정</h2>

        <!-- 수정 폼 -->
        <form action="update_post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3">
                <label for="name" class="form-label">이름</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">제목</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">학년</label>
                <select class="form-control" id="year" name="year" required>
                    <option value="1학년" <?php echo ($year == '1학년') ? 'selected' : ''; ?>>1학년</option>
                    <option value="2학년" <?php echo ($year == '2학년') ? 'selected' : ''; ?>>2학년</option>
                    <option value="3학년" <?php echo ($year == '3학년') ? 'selected' : ''; ?>>3학년</option>
                    <option value="4학년" <?php echo ($year == '4학년') ? 'selected' : ''; ?>>4학년</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">휴대폰</label>
                <select class="form-control" id="phone" name="phone" required>
                    <option value="SKT" <?php echo ($phone == 'SKT') ? 'selected' : ''; ?>>SKT</option>
                    <option value="KTF" <?php echo ($phone == 'KTF') ? 'selected' : ''; ?>>KTF</option>
                    <option value="LGU+" <?php echo ($phone == 'LGU+') ? 'selected' : ''; ?>>LGU+</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">내용</label>
                <textarea class="form-control" id="content" name="content" rows="4" required><?php echo htmlspecialchars($content); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">파일첨부</label>
                <input type="file" class="form-control" id="file" name="file">
                <?php if ($file) { echo "<p>현재 첨부된 파일: <a href='$file' target='_blank'>파일 보기</a></p>"; } ?>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-dark">수정완료</button>
                <a href="list_posts.php" class="btn btn-outline-dark">목록으로</a>
            </div>
        </form>
    </div>
</body>
</html>
