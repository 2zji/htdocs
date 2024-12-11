<script>
    function imageView(url) {
        if (url) {
            var imgW = document.getElementById('img1').naturalWidth;
            var imgH = document.getElementById('img1').naturalHeight;
            var imgWindow = window.open("", "_image_view_", "width=" + imgW + ",height=" + imgH);
            imgWindow.document.write("<img src='" + url + "'>");
        }
    }
</script>

<?php
// 1. db 접속
include('./db_conn.php');

// 2. 쿼리 작성
$sql = "SELECT * FROM img2 ORDER BY id DESC";

// 3. 쿼리 실행
$result = mysqli_query($conn, $sql);

// 4. 모든 이미지 출력
while ($re = mysqli_fetch_row($result)) {
    echo "<img id='img1_" . $re[0] . "' onclick='imageView(\"" . $re[2] . "\")' src='" . $re[2] . "' alt='" . $re[1] . "' width='100px' height='100px'><br>";
}

// 연결 종료
mysqli_close($conn);
?>
