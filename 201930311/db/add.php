<?php
echo "데이터를 추가합니다.<BR>";
echo $_SERVER['REQUEST_URI'];

//$_GET 배열
if(isset($_GET['title'])) {
    echo "<BR> 입력한 값은 = ".$_GET['title'];
    $dbinfo = include "../dbinfo.php";
    $db0 = new mysqli(
        $dbinfo['master']['dbhost'], // mysql 서버주소
        $dbinfo['master']['dbuser'], // 사용자아이디
        $dbinfo['master']['dbpass'], // 패스워드
        $dbinfo['master']['dbschema'] // 스키마
    );
    $query = "INSERT INTO `phpdaelim4`.`members` (`username`) VALUES ('".$_GET['title']."');";
    $result = mysqli_query($db0,$query);
}else{
    echo "값이 없다.";
}
