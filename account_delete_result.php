<?php
    $con=mysqli_connect("localhost","root","jkh2007!@#","sqldb") or die("접속실패");

    $userID = $_POST["userID"];

    $sql = " delete from userTbl where userID = '".$userID."'";
    
    $ret = mysqli_query($con,$sql);

    echo "<h1> 회원 정보 삭제 결과</h1>";
    if($ret) {
        echo "회원이 성공적으로 삭제됨";
    } else {
        echo "데이터 삭제 실패";
    }
    mysqli_close($con);

    echo "<br> <a href='account_manager.php'> 초기 화면으로 가기 </a>";

?>
