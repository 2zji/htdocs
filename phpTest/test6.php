<?php
/* 
//fgetc() fgets() fread() file_get_contents()

//fgetc()
$fname="data.txt";
$fp=fopen($fname, "r");
while($str=fgetc($fp)){
    echo $str;
}
fclose($fp);

//fgets()
$fname="data.txt";
$fp=fopen($fname, "r");
while($str=fgets($fp)){
    echo $str;
}
fclose($fp);

//fread()
$fname="data.txt";
$fp=fopen($fname, "r");
$str = fread($fp, filesize($fnaame));
echo $str;
fclose($fp);

//file_get_contents()
$fname="data.txt";
$str=fopen($fname, "r");
$str=file_get_contents($fname);
echo $str;
fclose($fp);
*/
?>

<?php
//fwrite()
$fname="output.txt";
$fp=fopen($fname, "w");
$content="Mike goes to home";
fwrite($fp, $content);
echo "파일저장완료!!"
fclose($fp);
?>

<?php
$fname="test.txt";
$fp=fopen($fname, "w");
$content="jane jod d ball";
file_get_contents($fname, $content);
echo "파일저장완료!!";
fclose($fp);
?>