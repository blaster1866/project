<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>
<body>
    <h1> 신규 회원 등록 </h1>
    <form action="account_insert_result.php" method="post">
        아이디: <input type="text" name="userID"> <br>
        이름: <input type="text" name="name"> <br>
        출생년도: <input type="text" name="birthYear"> <br>
        지역: <input type="text" name="addr"> <br>
        휴대폰 국번: <input type="text" name="mobile1"> <br>
        휴대폰 전화번호: <input type="text" name="mobile2"> <br>
        신장: <input type="text" name="height"> <br>
        <br><br>
        <input type="submit" value="회원 입력">
    </form>
</body>
</html>