<!--로그인-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 데이터베이스 연결
    include('./db_conn.php');

    // 사용자 입력 값
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    // 이메일로 사용자 정보 조회 (Prepared Statement 사용)
    $sql = "SELECT passwd FROM yea_user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // 비밀번호 확인
        if (password_verify($passwd, $row['passwd'])) {
            session_start();
            $_SESSION['email'] = $email; // 이메일 세션 저장

            // 이름 조회
            $name_sql = "SELECT name FROM yea_user WHERE email = ?";
            $name_stmt = $conn->prepare($name_sql);
            $name_stmt->bind_param("s", $email);
            $name_stmt->execute();
            $name_result = $name_stmt->get_result();

            if ($name_result->num_rows > 0) {
                $name_row = $name_result->fetch_assoc();
                $_SESSION['name'] = $name_row['name']; // 이름 세션 저장
            }

            $_SESSION['loggedin'] = true; // 로그인 상태 세션 저장
            echo "<script>alert('로그인 성공!');</script>";
            header("Location: index.php"); // index.php로 리다이렉트
            exit();
        } else {
            echo "<script>alert('비밀번호가 잘못되었습니다.');</script>";
        }
    }

    // 데이터베이스 연결 종료
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>YEA.</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--Header-->
    <div id="headerWrapper">
        <div id="headerBox" class="header">
            <div id="logo">
                <a href="index.php">
                    <img src="pic/logo.png" alt="YEA." id="YEA">
                </a>
            </div>
            <div class="head">
                <img src="pic/header_basket.png" id="head">
                <a href="login.php">
                    <img src="pic/login.png" id="head">
                </a>
            </div>
        </div>

        <div id="headerName" class="menu">
            <a href="qna.html" class="gotong">
                <p>Q&A</p>
            </a>
            <a href="contents.html" class="gotong">
                <p>컨텐츠</p>
            </a>
            <a href="style.html" class="gotong">
                <p>스타일</p>
            </a>
            <a href="recommend.html" class="gotong">
                <p>추천</p>
            </a>
            <a href="brand.html" class="gotong">
                <p>브랜드 소개</p>
            </a>
        </div>
    </div>

    <!--검색창-->
    <div class="search-container">
        <form class="search-box" action="/search" method="GET">
            <input type="text" name="query" class="search-input" placeholder="여기에 입력하세요">
            <button type="submit" class="search-button btn btn-danger">검색</button>
        </form>
    </div>

    <hr style="border: solid 1px rgb(213, 64, 0)">

    <!--로그인 폼-->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">로그인</h2>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">이메일</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="이메일을 입력하세요" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwd" class="form-label">비밀번호</label>
                        <input type="password" class="form-control" id="passwd" name="passwd" placeholder="비밀번호를 입력하세요" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger">로그인</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p>계정이 없으신가요? <a href="signup.php" class="text-danger">회원가입</a></p>
                </div>
            </div>
        </div>
    </div>

    <hr style="border: solid 1px rgb(213, 64, 0)">

    <!--정보 및 이용약관 등-->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>정보</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="gotong">이용약관</a></li>
                        <li><a href="#" class="gotong">개인정보 취급방침</a></li>
                        <li><a href="#" class="gotong">문의하기</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>계정</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="gotong">마이 계정</a></li>
                        <li><a href="#" class="gotong">주문 내역</a></li>
                        <li><a href="#" class="gotong">배송 조회</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>연락처</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="gotong">미림마이스터고등학교</a></li>
                        <li><a href="#" class="gotong">전화: 010-8500-2651</a></li>
                        <li><a href="#" class="gotong">이메일: s2313@e-mirim.hs.kr</a></li>
                        <li><a href="#" class="gotong">페이스북</a></li>
                        <li><a href="#" class="gotong">인스타그램</a></li>
                        <li><a href="#" class="gotong">트위터</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p>© 2024 YEA. All Rights Reserved.</p>
    </footer>
</body>

</html>