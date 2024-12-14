<?php
session_start();
include('./db_conn.php');

// GET 요청으로 전달된 ID 확인
if (!isset($_GET['id'])) {
    die("잘못된 접근입니다.");
}

$task_id = mysqli_real_escape_string($conn, $_GET['id']);

// 해당 ID의 할 일 데이터 가져오기
$sql = "SELECT * FROM tasks WHERE id = '$task_id' AND userid = '{$_SESSION['userid']}'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("할 일을 찾을 수 없습니다.");
}

$task = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>상세보기</title>
    <link rel="stylesheet" href="css/todo.css">
</head>
<body>
    <div class="container">
        <h2><?= htmlspecialchars($task['title']) ?></h2>
        <p><?= nl2br(htmlspecialchars($task['description'])) ?></p>
        <?php if ($task['image_path']): ?>
            <img src="<?= htmlspecialchars($task['image_path']) ?>" alt="Task Image" style="max-width: 300px;">
        <?php endif; ?>
        <div class="buttons">
            <form method="GET" action="delete_task.php" style="display: inline;">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <button type="submit" class="btn btn-delete">삭제</button>
            </form>
            <button onclick="window.location.href='todo.php'" class="btn btn-back">돌아가기</button>
        </div>
    </div>
</body>
</html>
