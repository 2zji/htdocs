<?php
session_start();

// 로그인 여부 확인
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// 데이터베이스 연결
include('./db_conn.php');

// 로그인 사용자 정보
$user_id = $_SESSION['user_id'];

// 할 일 목록 조회
$sql = "SELECT * FROM tasks WHERE userid = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO 리스트</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
        }
        .task-list {
            margin-top: 20px;
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        .task-actions {
            display: flex;
            gap: 10px;
        }
        .task-actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .add-task-form {
            margin-top: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TODO 리스트</h2>

        <!-- 할 일 목록 -->
        <div class="task-list">
            <?php while ($task = mysqli_fetch_assoc($result)): ?>
                <div class="task-item">
                    <div>
                        <strong><?php echo htmlspecialchars($task['title']); ?></strong>
                        <p><?php echo nl2br(htmlspecialchars($task['description'])); ?></p>
                        <small><?php echo htmlspecialchars($task['created_at']); ?></small>
                    </div>
                    <div class="task-actions">
                        <form method="POST" action="update_task.php">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <input type="submit" value="완료">
                        </form>
                        <form method="POST" action="delete_task.php">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <input type="submit" value="삭제">
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- 할 일 추가 -->
        <form method="POST" action="add_task.php" class="add-task-form">
            <h3>할 일 추가</h3>
            <input type="text" name="title" placeholder="제목" required>
            <textarea name="description" placeholder="내용" rows="4"></textarea>
            <input type="submit" value="추가">
        </form>
    </div>
</body>
</html>
