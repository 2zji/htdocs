<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<link rel="stylesheet" href="css/main.css">
<body>

<div class="container mt-5">
    <h2>회원가입 명단</h2>
    <table class="table table-bordered table-hover ">
        <thead class="thead-light">
            <tr>
                <th>번호</th>
                <th>아이디</th>
                <th>이름</th>
                <th>비밀번호</th>
                <th>이메일</th>
                <th>전화번호</th>
                <th>주소</th>
                <th>가입날짜</th>
                <th>수정/삭제</th>
            </tr>
        </thead>
        <tbody>

<?php

include("./db_conn.php");
$sql = "select * from member order by id desc";
$result = mysqli_query($conn, $sql);
$cnt = mysqli_num_rows($result);

for($i=0; $i<$cnt; $i++){
    $a = mysqli_fetch_row($result);
    echo "<tr><td>$a[0]</td> <td>$a[1]</td> <td>$a[2]</td> <td>$a[3]</td> <td>$a[4]</td> <td>$a[5]</td> <td>$a[6]</td> <td>$a[7]</td>
    <td><a href='update_form.php?idx=$a[0]' class='btn btn-primary btn-sm'>수정</a> 
    <a href='delete.php?idx=$a[0]' class='btn btn-danger btn-sm'>삭제</a></td></tr> ";//★?가 GET방식으로 받는당!!★
}

    
mysqli_close($conn);



?>

<a href="join_form.html" class="btn btn-primary btn-sm">회원가입</a>