    <?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "dream_diary");
    
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        echo "회원가입 성공!";
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["user_id"] = $row["id"];
                header("Location: home.php");
            } else {
                echo "비밀번호가 틀렸습니다.";
            }
        } else {
            echo "사용자를 찾을 수 없습니다.";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_dream"])) {
        if (!isset($_SESSION["user_id"])) {
            die("로그인이 필요합니다.");
        }
        
        $user_id = $_SESSION["user_id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $date = date("Y-m-d H:i:s");
    
        $stmt = $conn->prepare("INSERT INTO dreams (user_id, title, content, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $title, $content, $date);
        $stmt->execute();
        echo "꿈이 기록되었습니다.";
    }
    
    ?>
    
    <!DOCTYPE html>
    <html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>꿈일기</title>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; }
            .container { width: 50%; margin: auto; background: white; padding: 20px; border-radius: 10px; }
            input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
            button { padding: 10px; background: blue; color: white; border: none; cursor: pointer; }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>꿈 기록하기</h2>
            <form method="POST">
                <input type="text" name="title" placeholder="꿈 제목" required>
                <textarea name="content" placeholder="꿈 내용" required></textarea>
                <button type="submit" name="add_dream">기록</button>
            </form>
            
            <h2>내 꿈 목록</h2>
            <?php
            if (isset($_SESSION["user_id"])) {
                $user_id = $_SESSION["user_id"];
                $stmt = $conn->prepare("SELECT title, content, date FROM dreams WHERE user_id = ? ORDER BY date DESC");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
    
                while ($row = $result->fetch_assoc()) {
                    echo "<div><h3>" . htmlspecialchars($row["title"]) . "</h3>";
                    echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
                    echo "<small>" . $row["date"] . "</small></div><hr>";
                }
            }
            ?>
        </div>
    </body>
    </html>
