<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$all_plus = 0;
foreach ($numbers as $number){
    $all_plus += $number;
}
echo "1~10의 합: ", $all_plus;


$a = 0;
for($i = 0; $i <= 10; $i++){
    $a += $i;
}
echo "<br>1~10의 합: ", $a;
?>