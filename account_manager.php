<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> 회원 관리 시스템 </h1>
    <a href="account_select.php"> 1. 회원 조회 (조회 후 수정/삭제 가능)</a> <br><br>
    <a href="account_insert.php"> 2. 신규 회원 등록</a> <br><br>
    <form action="account_update.php" method="get">
        3. 회원 수정 - 회원 아이디:
        <input type="text" name="userID">
        <input type="submit" value="수정">
    </form>
    <form action="account_delete.php" method="get">
        4. 회원 삭제 - 회원 아이디:
        <input type="text" name="userID">
        <input type="submit" value="삭제">
    </form>

</body>
</html>