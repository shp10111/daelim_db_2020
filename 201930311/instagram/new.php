<?php
include "theme.conf.php";
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

    header("location:/");
}

$layout = file_get_contents($theme['layout']);

$contents = file_get_contents($theme['new']);

    $formlist =[
        "title"=>[
            'label' => "제목",
            'name' => "title",
            'description' => "제목을 입력해주세요"
        ], 
        "description"=>[
            'label' => "설명",
            'name' => "description",
            'description' => "설명을 입력해주세요"
        ],
        "location"=>[
            'label' => "위치",
            'name' => "location",
            'description' => "위치를 입력해주세요"
        ],
        "regdate"=>[
            'label' => "등록일",
            'name' => "regdate",
            'description' => "등록일을 입력해주세요"
        ]
    ];
    $form_str = "";

    foreach($formlist as $name){
        // $form_str .= '<input type="text" name="'.$name.'">';
        // $form_str .= "<BR>";
        $form_str .= form_input($name);
    }
    $contents = str_replace("{{formlist}}",$form_str,$contents);

$layout = str_replace("{{contents}}",$contents,$layout);
echo $layout;

function form_input($arg){
    global $path;
    $name = $arg['name'];
    $title = $arg['label'];
    $description = $arg['description'];

    $form_str = file_get_contents($path."form_input.html");
    $form_str = str_replace("{{name}}",$name,$form_str);
    $form_str = str_replace("{{title}}",$title,$form_str);
    $form_str = str_replace("{{description}}",$description,$form_str);

    return $form_str;
}




?>
