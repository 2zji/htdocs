<?php
//1. 정수 5개를 입력 받아서 짝수, 홀수별 합계 출력
$even_sum = 0;
$odd_sum = 0;

$input_values = array_map('intval', explode(',', $_POST['ua']));

foreach ($input_values as $num) {
    if ($num % 2 == 0) {
        $even_sum += $num;
    } else {
        $odd_sum += $num;
    }
}

echo "짝수의 합계: $even_sum<br>";
echo "홀수의 합계: $odd_sum<br>";

//2.  정수 n을 입력받은 후, 1부터 100까지의 정수 중에서 n의 배수만 출력
if (isset($_POST['ub'])) {
    $ub = (int)$_POST['ub'];

    if ($ub > 0) {
        echo "1부터 100까지의 정수 중에서 n의 배수:<br>";
        
        for ($i = $ub; $i <= 100; $i += $ub) {
            echo $i . ' ';
        }
        echo '<br>';
    } else {
        echo "유효한 자연수를 입력하세요.<br>";
    }
} else {
    echo "값을 입력해주세요.<br>";
}

//3. 10 이하의 자연수 n을 입력받아 "Daniel"을 n번 출력
if (isset($_POST['uc']) && is_numeric($_POST['uc'])) {
    $n = intval($_POST['uc']); // 입력값을 정수로 변환

    if ($n > 0 && $n <= 10) {
        // 1부터 n까지 "Daniel"을 출력
        for ($i = 0; $i < $n; $i++) {
            echo "Daniel ";
        }
        echo "<br>";
    } else {
        echo "입력한 값이 10 이하의 자연수가 아닙니다.<br>";
    }
} else {
    echo "입력된 값이 유효하지 않습니다.<br>";
}

//4. 100 이하의 두 개의 정수를 입력받아 작은 수부터 큰 수까지 차례대로 출력
if (isset($_POST['uc'])) {
    $input_values = $_POST['uc'];

    $numbers = explode(',', $input_values);

    $integers = array_map('intval', $numbers);

    if (count($integers) == 2) {
        $min = min($integers[0], $integers[1]);
        $max = max($integers[0], $integers[1]);

        for ($i = $min; $i <= $max; $i++) {
            echo "$i<br>";
        }
    } else {
        echo "두 개의 정수를 올바르게 입력하세요.<br>";
    }
} else {
    echo "두 개의 정수를 입력하세요.<br>";
}
//5. 정수를 입력받아서 1부터 입력받은 정수까지의 5의 배수의 합을 구하여 출력

//6. 100이하의 자연수 n을 입력받고 n개의 정수를 입력받아 평균을 출력

//7. 10개의 정수를 입력받아 입력받은 수들 중 짝수의 개수와 홀수의 개수를 각각 구하여 출력

//8. 두 개의 정수를 입력받아 두 정수 사이(두 정수를 포함)에 3의 배수이거나 5의 배수인 수들의 합과 평균을 출력

//9. 한 개의 자연수를 입력받아 그 수의 배수를 차례로 10개 출력

?>