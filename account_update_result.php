<?php
    $con=mysqli_connect("localhost","root","jkh2007!@#","sqldb") or die("접속실패");

    $userID = $_POST["userID"];
    $name = $_POST["name"];
    $birthYear = $_POST["birthYear"];
    $addr = $_POST["addr"];
    $mobile1 = $_POST["mobile1"];
    $mobile2 = $_POST["mobile2"];
    $height = $_POST["height"];
    $mDate = $_POST["mDate"];

    // $sql = " update userTbl set (name, birthYear, addr, mobile1, mobile2, height) = 
    // ('".$name."', '".$birthYear."', '".$addr."', '".$mobile1."', '".$mobile2."', '".$height."')";

    $sql = " update userTbl set name = '".$name."', birthYear = '".$birthYear."', addr = '".$addr."',
            mobile1 = '".$mobile1."', mobile2 = '".$mobile2."', height = '".$height."'
             where userID = '".$userID."'";
    
    $ret = mysqli_query($con,$sql);

    echo "<h1> 회원 정보 수정 결과</h1>";
    if($ret) {
        echo "데이터 입력 성공";
    } else {
        echo "데이터 입력 실패";
    }
    mysqli_close($con);

    echo "<br> <a href='account_manager.php'> 초기 화면으로 가기 </a>";

?>