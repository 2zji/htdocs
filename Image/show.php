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
//1. db접속
include('./db_conn.php');

//2. $sql = select
$sql = "SELECT * FROM img2 ORDER BY id DESC";

//3. $result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);

$re = mysqli_fetch_row($result);

echo "<img id='img1' onclick='imageView(\"$re[2]\")' src='$re[2]' alt='이거뭐지' width='100px' height='100px'>";

// 연결 종료
mysqli_close($conn);

?>