<?php
session_start();

// 로그인 상태 확인
if (!isset($_SESSION['userid'])) {
    header("Location: index.php"); // 로그인되지 않은 경우, 로그인 페이지로 리다이렉트
    exit();
}

// 데이터베이스 연결
include('./db_conn.php');

// 할 일 추가 처리
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_task'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $userid = $_SESSION['userid']; // 로그인된 사용자의 ID를 사용

    $sql = "INSERT INTO tasks (userid, title, description, status, priority) 
            VALUES ('$userid', '$title', '$description', 'pending', 'medium')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('할 일이 추가되었습니다.');</script>";
    } else {
        echo "<script>alert('할 일 추가 실패: " . mysqli_error($conn) . "');</script>";
    }
}

// 할 일 목록 가져오기
$sql = "SELECT * FROM tasks WHERE userid = '{$_SESSION['userid']}' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>할 일 관리</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>할 일 관리</h1>
            <a href="logout.php">로그아웃</a>
        </header>

        <!-- 할 일 추가 버튼 -->
        <button id="addTaskBtn" onclick="toggleAddTaskForm()">할 일 추가</button>

        <!-- 할 일 추가 폼 (숨기기/보이기) -->
        <div id="addTaskForm" style="display: none;">
            <form method="POST" action="todo.php">
                <label for="title">할 일 제목</label>
                <input type="text" id="title" name="title" required>

                <label for="description">할 일 설명</label>
                <textarea id="description" name="description" required></textarea>

                <button type="submit" name="add_task">추가하기</button>
            </form>
            <button onclick="toggleAddTaskForm()">취소</button>
        </div>

        <!-- 할 일 목록 표시 -->
        <h2>할 일 목록</h2>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <strong><?= htmlspecialchars($task['title']) ?></strong> - <?= htmlspecialchars($task['description']) ?>
                    <span>(상태: <?= htmlspecialchars($task['status']) ?>)</span>
                    <!-- 할 일 삭제 버튼 -->
                    <a href="delete_task.php?id=<?= $task['id'] ?>">삭제</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script>
        // 할 일 추가 폼 보이기/숨기기
        function toggleAddTaskForm() {
            const form = document.getElementById('addTaskForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
