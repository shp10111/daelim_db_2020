<?php

// echo "대림대학교";
include "theme.conf.php";

$dbinfo =  include "../dbinfo.php";
// 객체 생성
$db = new mysqli(
    $dbinfo['master']['dbhost'], // mysql 서버주소
    $dbinfo['master']['dbuser'], // 사용자아이디
    $dbinfo['master']['dbpass'], // 패스워드
    $dbinfo['master']['dbschema'] // 스키마
);

if ($db) {
    // echo "DB 접속 성공"."<br>";
    $query = "SELECT * FROM phpdaelim4.instagram;";
    $result = mysqli_query($db,$query);
    if($result){
        $rows = getRowData($result);
    }

    // echo "<A href='new.php'>NEW</a>";
    // 파일을 읽어서 변수에 넣어주세요
    $layout = file_get_contents($theme['layout']);

    $contents = file_get_contents($theme['list']);
    $contents = str_replace("{{datatable}}",viewTable($rows),$contents);

    $layout = str_replace("{{contents}}",$contents,$layout);
    echo $layout;
    


} else {
    // echo "접속실패";
}

function viewTable($rows){
    
    $str = "<table class=\"table table-striped\">";

    for($i=0;$i<count($rows);$i++)
        {
            $str .= "<TR>";
            
            foreach($rows[$i] as $value){
                $str .= "<TD>".$value."</TD>";
            }
            
            //echo "<TD>".$row->username."</TD>";
            //echo "<TD>".$row->usernum."</TD>";
            $str .= "</tr>";
        }
        $str .= "</TABLE>";
        return $str;
}

function getRowData($result){
    $cnt = mysqli_num_rows($result);
    // echo "데이터의 갯수는 = " .$cnt. "<BR>";
    $rows = [];
    for($i=0;$i<$cnt;$i++){
        $rows []= mysqli_fetch_object($result);
    }
    return $rows;
}