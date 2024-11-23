<?php
//fgetc() fgets() fread() file_get_contents()

//1.파일 오픈   (파일을 읽어서 출력)
//2.파일 작업
    //한 글자 읽어서 $str에 대입 (getc())
//3.파일 닫는다

    $fp=fopen("data.txt", "r");


    $str=fgetc($fp);
    //$str 출력
    echo "출력: " . $str . "<br>";
    

    fclose($fp);

    //gets()
    $str2=fgets($fp);
    echo $str2;
    fclose($fp);


while(($str=fgetc($fp))!==false){
    echo $str;
}
fclose($fp);

$str=readfile("data.txt");
echo
fclose($fp);

echo file_get_contents("./data.txt");
fclose($fp);
?>