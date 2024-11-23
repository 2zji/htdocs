<?php
$fname = "counter.txt";
$fp = fopen($fname, "r");
$b = fgets($fp);
$a = (int)$b;
$a = $a+1;
echo "현재 접속자 수: ". $a;
fclose($fp);
?>