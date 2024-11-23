<?php
$a = $_POST['ua'];
$b = $_POST['ub'];
$c = $_POST['uc'];

if($a == 0){
    echo "시스템 종료";
}
else if($a == 1 && $b != 0){
    echo "원의 넓이: ". $b*$b*3.14;
    echo " 원의 둘레: ". 2*$b*3.14;
}
if($a == 2 && $c != 0){
    echo "정사각형의 넓이". $a*$c;
}

?>
