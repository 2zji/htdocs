<!--로그인-->
<?php
include('./db_conn.php');


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

    <div id="headerWrapper">
        <div id="headerBox" class="header">
            <div id="logo">
                <img src="pic/logo.png" alt="YEA." id="YEA">
            </div>
            <div class="head">
                <img src="pic/header_basket.png" id="head">
                <a href="login.html" target="_blank">
                    <img src="pic/login.png" id="head">
                </a>
            </div>

        </div>

        <div id="headerName" class="menu">
            <p>프로모션</p>
            <p>컨텐츠</p>
            <p>스타일</p>
            <p>추천</p>
            <p>브랜드 소개</p>
        </div>
    </div>

    <div class="search-container">
        <form class="search-box" action="/search" method="GET">
            <input type="text" name="query" class="search-input" placeholder="여기에 입력하세요">
            <button type="submit" class="search-button btn btn-danger">검색</button>
        </form>
    </div>

    <hr style="border: solid 1px rgb(213, 64, 0)">

    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>정보</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">이용약관</a></li>
                        <li><a href="#">개인정보 취급방침</a></li>
                        <li><a href="#">문의하기</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>계정</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">마이 계정</a></li>
                        <li><a href="#">주문 내역</a></li>
                        <li><a href="#">배송 조회</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>연락처</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">미림마이스터고등학교</a></li>
                        <li><a href="#">전화: 010-8500-2651</a></li>
                        <li><a href="#">이메일: s2313@e-mirim.hs.kr</a></li>
                        <li><a href="#">페이스북</a></li>
                        <li><a href="#">인스타그램</a></li>
                        <li><a href="#">트위터</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p>© 2024 YEA. All Rights Reserved.</p>
    </footer>
</body>

</html>