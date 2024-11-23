<?php
session_start();


// 비밀번호 확인 폼
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $id = $_GET['idx'];




    // 데이터베이스 연결
    $conn = mysqli_connect('localhost', 'root', '111111', 'testdb');
    $sql = "SELECT password FROM login WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);


    if (!$user) {
        echo "<script>alert('사용자를 찾을 수 없습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        exit();
    }


    echo '<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 300px;
        text-align: center; /* 폼 안의 요소 중앙 정렬 */
    }
    label {
        display: block;
        margin-bottom: 10px;
        color: #333;
        text-align: center; /* 비밀번호 라벨 중앙 정렬 */
    }
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .button-group {
        display: flex;
        justify-content: space-between;
    }
    input[type="submit"], input[type="button"] {
        width: 48%; /* 버튼 너비를 48%로 줄임 */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #dfb0ff !important;
        color: white !important;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover, input[type="button"]:hover {
        background-color: #c087e5 !important; /* 버튼 호버 색상 */
    }
  </style>';


echo '<form method="POST" action="" onsubmit="return confirmDelete();">
  <label for="password">비밀번호</label>
  <input type="password" id="password" name="password" required>
  <input type="hidden" name="idx" value="' . htmlspecialchars($id) . '">
  <div class="button-group">
      <input type="submit" value="삭제">
      <input type="button" value="취소" onclick="goBack();">
  </div>
</form>';


echo '<script>
    function confirmDelete() {
        return confirm("정말 삭제하시겠습니까?");
    }
    function goBack() {
        window.location.href = "http://localhost/login/index.php"; // 지정된 URL로 이동
    }
  </script>';




    exit();
}


// 비밀번호 확인
$password = $_POST['password'];
$id = $_POST['idx'];


// 데이터베이스 연결
$conn = mysqli_connect('localhost', 'root', '111111', 'testdb');
$sql = "SELECT * FROM login WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);


// if ($user['password'] != $password) {
//     echo "<script>alert('비밀번호가 잘못되었습니다.');</script>";
//     echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
//     exit();
// }


// // 비밀번호가 맞으면 삭제
//$sql = "DELETE FROM login WHERE id = $id";
// if (mysqli_query($conn, $sql)) {
//     echo "<script>alert('삭제되었습니다!');</script>";
// } else {
//     echo "<script>alert('삭제 실패: " . mysqli_error($conn) . "');</script>";
// }
if ($user['passwd'] == $password) {
    $sql = "DELETE FROM login WHERE id=$id";
    mysqli_query($conn, $sql);
    echo "<script>alert('Deleted!');</script>";
} else {
    echo "비밀번호가 틀렸습니다";
}


// 디비 종료
mysqli_close($conn);


// 페이지 리다이렉트
echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
?>



