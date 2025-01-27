<!--메인-->
<?php
session_start();

// 로그인 상태 확인
$is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
$name = $is_logged_in ? $_SESSION['name'] : null;

// POST 요청이 들어왔을 때 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['name'])) {
    // 이름 입력 처리
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['loggedin'] = true; // 로그인 상태로 설정
    $name = $_POST['name']; // 입력된 이름
  } else {
    echo "<p>Please enter your name.</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="css/home2.css" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <title>YEA.</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div id="headerWrapper">
    <div id="headerBox" class="header">
      <div id="logo">
        <img src="pic/logo.png" alt="YEA." id="YEA" />
      </div>
      <div class="head">
        <img src="pic/header_basket.png" id="head" />
        <a href="login.php">
          <img src="pic/login.png" id="head" />
        </a>
      </div>
      <?php if ($is_logged_in): ?>
        <div class="welcome-message">
          <?php echo htmlspecialchars($name); ?> 님, 안녕하세요!
        </div>
      <?php endif; ?>
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

  <div class="search-container">
    <form class="search-box" action="/search" method="GET">
      <input
        type="text"
        name="search"
        class="search-input"
        placeholder="여기에 입력하세요" />
      <button type="submit" class="search-button btn btn-danger">검색</button>
    </form>
  </div>

  <div
    id="carouselExampleIndicators"
    class="carousel slide"
    data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"></button>
      <button
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide-to="2"
        aria-label="Slide 3"></button>
      <button
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide-to="3"
        aria-label="Slide 4"></button>
    </div>

    <div id="carouselHeader" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="pic/main1.png"
            class="d-block w-100 main-img"
            alt="main1" />
        </div>
        <div class="carousel-item">
          <img
            src="pic/main2.png"
            class="d-block w-100 main-img"
            alt="main2" />
        </div>
        <div class="carousel-item">
          <img
            src="pic/main3.png"
            class="d-block w-100 main-img"
            alt="main3" />
        </div>
        <div class="carousel-item">
          <img
            src="pic/main4.png"
            class="d-block w-100 main-img"
            alt="main4" />
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="intd">
    <br />
    <h4>YEJI'S PICK</h4>
    <br />
  </div>
  <div id="carouselGoods" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="card-group d-flex">
          <div class="card" style="width: 18rem">
            <img src="pic/apples.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">멜팅애플 프린팅 반팔티 화이트</h5>
              <p class="card-text">19,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/cap1.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">코카-콜라 로고 베이직 볼캡 레드</h5>
              <p class="card-text">39,800원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/cap2.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">goggles short beanie(고글 숏 비니)</h5>
              <p class="card-text">39,000원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/pants1.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                나일론 투 턱 테이핑 팬츠-와인(Cool Air)
              </h5>
              <p class="card-text">38,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="card-group d-flex">
          <div class="card" style="width: 18rem">
            <img src="pic/pants2.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Wide Cargo Half Denim Pants - 5COL</h5>
              <p class="card-text">39,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/pants3.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                버뮤다 와이드 원턱 스웨트 쇼츠 [그레이]
              </h5>
              <p class="card-text">20,800원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/pizza.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                루즈핏 크루넥 PIZZA 그래픽 티셔츠 화이트
              </h5>
              <p class="card-text">9,750원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/rockstar.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">PUNK PICASSO PLAYING GUITAR TEE</h5>
              <p class="card-text">32,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselGoods"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselGoods"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    <br />
  </div>

  <hr style="border: dashed 1px rgb(213, 64, 0)" />

  <div class="best intd">
    <br />
    <h4>BEST</h4>
    <br />
  </div>

  <div id="carouselBest" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- 첫 번째 슬라이드 -->
      <div class="carousel-item active">
        <div class="card-group d-flex">
          <div class="card" style="width: 18rem">
            <img src="pic/best1.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">데이오프 그래픽 티셔츠_레드_DT395</h5>
              <p class="card-text">25,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best2.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">리프 백팩 (블랙)ㅤㅤㅤㅤㅤㅤㅤ</h5>
              <p class="card-text">49,000원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best3.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">실크핏 클린 반팔 커플 잠옷 세트</h5>
              <p class="card-text">21,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best4.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">DTP 드로잉 반팔 티셔츠_D03 유니버스</h5>
              <p class="card-text">19,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- 두 번째 슬라이드 -->
      <div class="carousel-item">
        <div class="card-group d-flex">
          <div class="card" style="width: 18rem">
            <img src="pic/best5.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">[PAT&MAT] 모션 패트 티셔츠 - 화이트</h5>
              <p class="card-text">43,680원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best6.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">스피드캣 OG - 레드 / 398846-02</h5>
              <p class="card-text">139,000원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best7.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">LYRICIST STAR TEE [CREAM]</h5>
              <p class="card-text">13,600원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best8.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">심볼 로고 드로잉 레터링 티셔츠 WHITE</h5>
              <p class="card-text">24,900원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- 세 번째 슬라이드 -->
      <div class="carousel-item">
        <div class="card-group d-flex">
          <div class="card" style="width: 18rem">
            <img src="pic/best9.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                시스루 더블 레이어드 반팔 티셔츠 [그레이]
              </h5>
              <p class="card-text">25,200원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best10.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">
                스몰 어센틱 로고 후디 집업 멜란지 그레이
              </h5>
              <p class="card-text">66,750원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best11.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">FLOWER ZIP UP HOOD(WINE)</h5>
              <p class="card-text">95,000원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
          <div class="card" style="width: 18rem">
            <img src="pic/best12.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">CASTAWAY DEFL VBㅤㅤㅤㅤㅤㅤㅤ</h5>
              <p class="card-text">30,000원</p>
              <button href="#" type="button" class="btn btn-outline-danger">
                Go somewhere
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselBest"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">이전</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselBest"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">다음</span>
    </button>
    <br />
  </div>

  <hr style="border: dashed 1px rgb(213, 64, 0)" />

  <div class="new intd">
    <br />
    <h4>STYLE</h4>
    <br />
  </div>
  <div id="carouselNew" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="new card-group d-flex">
          <div class="card">
            <img src="pic/style1.jpg" class="card-img-top" alt="..." />
          </div>
          <div class="card">
            <img src="pic/style2.jpg" class="card-img-top" alt="..." />
          </div>
          <div class="card">
            <img src="pic/style3.jpg" class="card-img-top" alt="..." />
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="new card-group d-flex">
          <div class="card">
            <img src="pic/style4.jpg" class="card-img-top" alt="..." />
          </div>
          <div class="card">
            <img src="pic/style5.jpg" class="card-img-top" alt="..." />
          </div>
          <div class="card">
            <img src="pic/style6.jpg" class="card-img-top" alt="..." />
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="new card-group d-flex">
          <div class="card">
            <img src="pic/style7.jpg" class="card-img-top" alt="..." />
          </div>
          <div class="card">
            <img src="pic/style8.jpg" class="card-img-top" alt="..." />
          </div>
          <div class="card">
            <img src="pic/style9.jpg" class="card-img-top" alt="..." />
          </div>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselNew"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselNew"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    <br />
  </div>

  <hr style="border: solid 1px rgb(213, 64, 0)" />

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

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>

</html>