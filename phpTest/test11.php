<?php
//checkbox 가져오기
$arr = $_POST['check'];
foreach($arr as $item){
//$arr에 들어있는 값을 하나씩 자동으로 $item에 넣는다.
    echo $item. "<br/>";
}

?>