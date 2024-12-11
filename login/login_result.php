<?php
$a = $_POST['id'];
$b = $_POST['userid'];  //$a: B
$c = $_POST['passwd'];  //$b: 222\

//php, mysql 연동

$conn = mysqli_connect('localhost', 'root', '111111', 'testdb');
/*if($conn){
    echo "Connected!";
} else{
    echo "Failed!";
}*/
$sql = "insert into login (id, userid, passwd) values($a, '$b', '$c');";
mysqli_query($conn, $sql);
/*echo "Inserted!!"."<br/>";
echo "<a href = 'delete.php?id=2'>삭제</a>";*/
mysqli_close($conn);
?>
<meta http-equiv='refresh' content = '0;URL=index.php'>