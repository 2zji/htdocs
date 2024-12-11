<?php
/*
1번

$numbers = [1, 2, 3, 4, 5];
$even_sum = 0;
$odd_sum = 0;

foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $even_sum += $number;
    } else {
        $odd_sum += $number;
    }
}

echo "숫자: " . implode(", ", $numbers) . "<br/>";
echo "짝수의 합계: " . $even_sum . "<br/>";
echo "홀수의 합계: " . $odd_sum . "<br/>";
*/

/* 
2번

$n = 4;
for($i = 0; $i<=100; $i++){
    if($i % $n == 0){
        echo $i . "\n";
    }
}
*/

/*
3번

echo "10이하의 자연수 n 입력하기: ";
$n = trim(fgets(STDIN));
for($i=0;$i<$n;$i++){
    echo "Daniel"."<br/>";
}
*/

/*
4번

echo "두 개의 정수를 입력(1~100): ";
$input = trim(fgets(STDIN));
$numbers = explode(" ", $input);
if(count($numbers) != 2) {
    echo "두 개의 정수를 입력하세요.\n";
    exit(1);
}
$first = intval($numbers[0]);
$second = intval($numbers[1]);
if($first > 100 || $second > 100) {
    echo "입력값은 100 이하여야 합니다.\n";
    exit(1);
}
$start = min($first, $second);
$end = max($first, $second);
echo "$start 부터 $end 까지의 숫자는 다음과 같습니다:\n";
for ($i = $start; $i <= $end; $i++) {
    echo $i . "\n";
}
*/

/*
5 번

echo "정수를 입력하세요: ";
$number = trim(fgets(STDIN));
if (!is_numeric($number) || $number <= 0) {
    echo "유효한 양의 정수를 입력하세요.\n";
    exit(1);
}
$number = (int)$number;
$sum = 0;
for ($i = 1; $i <= $number; $i++) {
    if ($i % 5 == 0) {
        $sum += $i;
    }
}
echo "1부터 $number 까지의 5의 배수의 합: $sum\n";
*/

/*
6번

do {
    echo "100 이하의 자연수 n을 입력하세요: ";
    $n = trim(fgets(STDIN));
} while (!is_numeric($n) || $n <= 0 || $n > 100 || intval($n) != floatval($n));
$n = (int)$n;
$sum = 0;
for ($i = 1; $i <= $n; $i++) {
    echo "정수를 입력하세요 ($i/$n): ";
    $input = trim(fgets(STDIN))
    if (!is_numeric($input)) {
        echo "유효한 정수를 입력하세요.\n";
        exit(1);
    }
    $sum += (int)$input;
}
$average = $sum / $n;
echo "입력한 $n 개의 정수의 평균은 $average 입니다.\n";
*/

/*
7번
$even_count = 0;
$odd_count = 0;
for ($i = 1; $i <= 10; $i++) {
    echo "정수를 입력하세요 ($i/10): ";
    $input = trim(fgets(STDIN));
    if (!is_numeric($input)) {
        echo "유효한 정수를 입력하세요.\n";
        exit(1);
    }
    $number = (int)$input;
    if ($number % 2 == 0) {
        $even_count++;
    } else {
        $odd_count++;
    }
}

echo "짝수 $even_count 개, 홀수 $odd_count 개\n";
*/

/*
8번
echo "첫 번째 정수를 입력: ";
$first = trim(fgets(STDIN));
echo "두 번째 정수를 입력: ";
$second = trim(fgets(STDIN));
if (!is_numeric($first) || !is_numeric($second)) {
    echo "유효한 정수를 입력하세요<.\n";
    exit(1);
}
$first = (int)$first;
$second = (int)$second;
$start = min($first, $second);
$end = max($first, $second);
$sum = 0;
$count = 0;
for ($i = $start; $i <= $end; $i++) {
    if ($i % 3 == 0 || $i % 5 == 0) {
        $sum += $i;
        $count++;
    }
}
$average = $count > 0 ? $sum / $count : 0;

echo "3or5의 배수의 합: $sum\n";
echo "$3or5의 배수의 평균: $average\n";
*/

/*
9번
do {
    echo "자연수 입력: ";
    $number = trim(fgets(STDIN));
} while (!ctype_digit($number) || $number <= 0);
$number = (int)$number;
echo "$number의 배수 10개:\n";
for ($i = 1; $i <= 10; $i++) {
    echo ($number * $i) . "\n";
}
*/
?>