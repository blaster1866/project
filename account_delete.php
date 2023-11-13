<?php
    $con=mysqli_connect("localhost","root","jkh2007!@#","sqldb") or die("접속실패");
    
    $sql="select * from userTbl where userID='".$_GET['userID']."'";

    $ret =mysqli_query($con,$sql);

    if($ret){
        $count = mysqli_num_rows($ret);
        if($count==0){
            echo $_GET['userID']."아이디의 회원이 없음"."<br>";
            echo "<br> <a href='account_manager.php'> 초기 화면으로 가기 </a>";
            exit();
        }
    }else{
        echo "조회 실패 <br>";
        echo "<br> <a href='account_manager.php'> 초기 화면으로 가기 </a>";
        exit();
    }

    $row = mysqli_fetch_array($ret);

    $userID = $row['userID'];
    $name = $row["name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <h1> 회원 정보 삭제</h1>
    <form action="account_delete_result.php" method="post">
        아이디: <input type="text" name="userID" value=<?php echo $userID ?> readonly> <br>
        이름: <input type="text" name="name" value=<?php echo $name ?> readonly> <br>
        <br><br>
        회원을 삭제하시겠습니까?
        <input type="submit" value="회원 삭제">
    </form>
</body>
</html>