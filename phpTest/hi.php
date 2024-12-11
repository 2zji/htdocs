<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<div>";
    echo "<b>이름:</b> " . $_POST['uname'] . "<br/>";
    echo "<b>주민등록번호:</b> " . $_POST['umy'] . " - " . $_POST['umm'] . "<br/>";
    echo "<b>아이디:</b> " . $_POST['uid'] . "<br/>";
    echo "<b>비밀번호:</b> " . $_POST['upass'] . "<br/>";

    // uqus 키의 존재 여부 확인 후 출력
    if (isset($_POST['uqus'])) {
        echo "<b>비밀번호 힌트:</b> " . $_POST['uqus'] . "<br/>";
        echo "<b>답변:</b> " . $_POST['uans'] . "<br/>";
    } else {
        echo "<b>비밀번호 힌트:</b> 비밀번호 힌트가 선택되지 않았습니다.<br/>";
        echo "<b>답변:</b> " . $_POST['uans'] . "<br/>";
    }

    echo "<b>이메일:</b> " . $_POST['umeil'] . "@" . $_POST['umeile'] . "<br/>";
    echo "<b>주소:</b> " . $_POST['uada'] . " - " . $_POST['uadb'] . " " . $_POST['uadc'] . "<br/>";
    echo "<b>전화번호:</b> " . $_POST['uta'] . " - " . $_POST['utb'] . " - " . $_POST['utc'] . "<br/>";
    echo "<b>핸드폰 번호:</b> " . $_POST['utf'] . " - " . $_POST['utm'] . " - " . $_POST['utl'] . "<br/>";
    echo "<b>직업:</b> " . $_POST['job'] . "<br/>";
    echo "<b>메일/sns정보 수신:</b> ";
    if ($_POST['a'] == 'b') {
        echo "수신";
    } else {
        echo "수신거부";
    }
    echo "<br/>";
    echo "<b>관심분야:</b> ";
    if (!empty($_POST['check'])) {
        $interests = $_POST['check'];
        foreach ($interests as $interest) {
            echo $interest . " ";
        }
        echo "<br/>";
    } else {
        echo "선택된 관심분야 없음<br/>";
    }
    echo "<b>가입경로:</b> " . $_POST['way'] . "<br/>";
    echo "<b>정보공개여부:</b> " . $_POST['gong'] . "<br/>";
    echo "</div>";
} else {
    echo "<div>";
    echo "올바른 방법으로 접근해주세요.";
    echo "</div>";
}
?>