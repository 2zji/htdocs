<?php

//1. strlen()
$str = "Tom received mt book";
//문자열 길이 출력
echo strlen($str);
$result =  strlen($str);
echo "<br>문자열 길이는 ". $result." 입니다.<br>";

//2. strpos()
$str = "Ken peceived my bag";
$substring = "e";
$result = strpos($str, $substring);
echo "strpos의 결과는 ". $result. " 입니다.<br>";

//3. substr($문자열, 시작 위치, 잘라낸 문자갯수)
$str = "string";
//1)앞 세글자 출력하기 : str
$result = substr($str, 0, 3);
echo "앞 세글자 ". $result." 입니다.<br>";

//2)세번째 부분부터 세글자 출력하기: rin
$result = substr($str, 0, 3);
echo "세번째 부분부터 세글자 ". $result."<br>";

//3)두번째 부분부터 끝가지 출력하기: tring
$result = substr($str, 1);
echo "두번째 부분부터 끝까지: ". $result."<br>";

//4)맨 뒤 한 글자 출력하기; g
$result = substr($str, -1, 1);
echo "맨 뒤 한글자: ". $result."<br>";

//5) $fname="apple.jpg";일때 확장자 출력
$fname = "apple.jpg";
$result = substr($fname, -4);
echo "확장자: " . $result. "<br>";

//4. strtolower()
//대문자를 소문자로, 소문자를 대문자로
$str = "Maey had a Little Lamb and She LOVED it SO!";
$result = strtoupper($str);
echo "대문자로 바꾸기".$str."<br>";
$result = strtolower($str);
echo "소문자로 바꾸기".$str."<br>";

//5. explode()
//쪼개서 $pieces에 넣고 출력시키기, print_r()
$pizza = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
print_r($pieces);
echo "<br>";
foreach($pieces as $item){
    echo $item;
}
echo "<br>";

//6. implode()
//$name을 ,로 구분해서 문자열에 넣고 출력
$name = array("kim", "lee", "park", "jang", "ko");
$str2 = implode(",", $name);
echo $str2 . "<br>";

//7. str_replace("변경 전 문자", "변경 후 문자", 전체문자열);
//should->could로 변경
$txt = "you should eat fruits";
str_replace("should", "could", $txt);
echo $txt . "<br>";

//8. trim()
$str = " mary had a bag ";
$n = trim($str);
echo $n;

?>