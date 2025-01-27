<!--회원가입-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 데이터베이스 연결
    include('./db_conn.php');

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // 비밀번호 해시 처리
    $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);

    // 회원가입 쿼리
    $sql = "INSERT INTO yea_user (email, passwd, name, phone, address) VALUES ('$email', '$hashed_passwd', '$id', '$phone', '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('회원가입이 완료되었습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
        exit();
    } else {
        echo "<script>alert('회원가입 실패: " . mysqli_error($conn) . "');</script>";
    }

    // 데이터베이스 연결 종료
    mysqli_close($conn);
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
                <h2 class="text-center mb-4">회원가입</h2>
                <form action="signup.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">이름</label>
                        <input type="name" class="form-control" id="name" name="name"
                            placeholder="아이디를 입력하세요" required>
                    </div>
                    <div class="mb-3">
                        <label for="id" class="form-label">아이디</label>
                        <input type="id" class="form-control" id="id" name="id"
                            placeholder="아이디를 입력하세요" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwd" class="form-label">비밀번호</label>
                        <input type="passwd" class="form-control" id="id" name="passwd"
                            placeholder="비밀번호를 입력하세요" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">이메일</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="이메일을 입력하세요" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">전화번호</label>
                        <input type="address" class="form-control" id="address" name="address"
                            placeholder="주소를 입력하세요" required>
                    </div>
                    <div class="mb-3">
                        <label for="home" class="form-label">주소</label>
                        <input type="phone" class="form-control" id="phone" name="phone"
                            placeholder="전화번호를 입력하세요" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger">회원가입</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p>계정이 있으신가요? <a href="login.php" class="text-danger">로그인</a></p>
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