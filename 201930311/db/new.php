<?php


if(isset($_POST['title'])){
    $dbinfo =  include "../dbinfo.php";

    $db0 = new mysqli(
        $dbinfo['master']['dbhost'], // mysql 서버주소
        $dbinfo['master']['dbuser'], // 사용자아이디
        $dbinfo['master']['dbpass'], // 패스워드
        $dbinfo['master']['dbschema'] // 스키마
    );

    // $query = "INSERT INTO `phpdaelim4`.`instagram` (`title`,`decription`) VALUES ('".$_POST['title']."','".$_POST['description']."');";
    // $result = mysqli_query($db0,$query);

    // print_r($_POST);
    // exit;
    $query = "INSERT `phpdaelim4`.`instagram` SET ";
    foreach($_POST as $key => $value){
        $query .= "`".$key."` = '".$value."',";
    }
    $query = rtrim($query,",");
    // $query .= "`title`='".$_POST['title']."',";
    // $query .= "`description`='".$_POST['description']."'";

    $result = mysqli_query($db0, $query);

    header("location:insta.php");
}

echo "새로운 값을 저장할 거야";
$form = file_get_contents("../resource/new.html");

$formlist =["title", "description","location","regdate"];
$form_str = "";
foreach($formlist as $name){
    $form_str .= '<input type="text" name="'.$name.'">';
    $form_str .= "<BR>";
}
$form = str_replace("{{formlist}}",$form_str,$form);
echo $form;




?>
