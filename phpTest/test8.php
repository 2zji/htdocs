<?php
$a=$_POST['uid'];   //$a : 사용자가 입력한 id가 들어감
$b=$_POST['ui'];

$id="Kim";
$pass="1111";

if($a==$id && $b==$pass){
    echo "사용자가 입력한 아이디는 ", $a, "<br/>";
    echo "사용자가 입력한 비밀번호는 ", $b, "<br/>";
}
//else if($a != $id){echo "아이디가 다릅니다.";}
//else if($b != $pass){ echo "비밀번호가 다릅니다.";} 
else{
    echo "아이디 또는 비밀번호가 다릅니다.";
}

?>