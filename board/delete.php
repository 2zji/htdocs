<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삭제 비밀번호 확인</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 600px; background-color: #ff99cc;">
        <h1 class="text-center mb-4">삭제 비밀번호 확인</h1>
        <form action="delete_passwd_check.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="password" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-dark">확인</button>
                <a href="list_page.php" class="btn btn-outline-dark">목록으로</a>
            </div>
        </form>
    </div>
</body>
</html>