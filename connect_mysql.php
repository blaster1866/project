<?php
//sqldb 스키마 접속
$con=mysqli_connect("localhost","root","jkh2007!@#","sqldb") or die("접속실패");
if($con){
    echo "sqldb 접속 성공";
    echo "<br>";
}

//스키마 없이 최초 접속시
/*
$db_host="localhost";
$db_user= "root";
$db_password= "jkh2007!@#";
$db_name= "";
$con=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(mysqli_connect_error()){
    echo "mysqli_connect_error", "<br>";
    echo "오류원인:", mysqli_connect_error();
    exit();
}
echo "mysql 접속 성공";
echo "<br>";
*/

//스키마 만들기
/*
$sql="CREATE DATABASE sqlDB";
$ret=mysqli_query($con,$sql);

if($ret){
    echo "sqldb가 성공적으로 생성됨";
}else{
    echo "sqldb 생성실패";
    echo "실패원인:", mysqli_error($con);
    echo "<br>";
}
*/

//테이블생성
/*
$sql= "
create table userTbl(
    userID char(8) not null primary key,
    name varchar(10) not null,
    birthYear int not null,
    addr char(2) not null,
    mobile1 char(3),
    mobile2 char(8),
    height smallint,
    mDate date
    )";
$ret=mysqli_query($con,$sql);
if($ret){
    echo "userTbl 성공적 생성됨";
}else{
    echo "userTbl 생성 실패";
    echo "", mysqli_error($con);
    echo "<br>";
}
*/

//insert into
/*
$sql = "
    insert into userTbl values
    ('lsg', '이승기', 1987, '서울', '010', '11112222', 182, '2008-08-08'),
    ('kbs', '김범수', 1979, '경남', '010', '11112222', 172, '2008-08-08'),
    ('kkh', '김경호', 1987, '서울', '010', '11112222', 182, '2008-08-08'),
    ('jyp', '조용필', 1967, '경기', '010', '11112222', 170, '2008-08-08'),
    ('yjs', '윤종신', 1987, '서울', '010', '11112222', 182, '2008-08-08'),
    ('jku', '조관우', 1987, '서울', '010', '11112222', 182, '2008-08-08'),
    ('bbk', '바비킴', 1987, '서울', '010', '11112222', 182, '2008-08-08')
";
$ret = mysqli_query($con,$sql);
if($ret){
    echo "userTbl에 데이터가 성공적으로 입력됨";
}else{
    echo "데이터 입력실패";
}
echo "<br>";
*/

//select 조회
$sql = "select * from userTbl";
$ret = mysqli_query($con,$sql);
if($ret) {
    echo mysqli_num_rows($ret), "건이 조회됨. <br><br>";
} else {
    echo "조회실패 <br>";
    exit();
}
while($row = mysqli_fetch_array($ret)){
    echo $row["userID"], " ", $row["name"], " ", $row["height"]," ", $row["mDate"];
    echo "<br>";
}

mysqli_close($con); 

?>