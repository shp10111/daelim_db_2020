<?php

#인사말1
echo "안녕하세요." . "<br>";
print "날씨가 참 좋네요.". "<br>";

#인사말2
echo "안녕하세요." . "<br>";
print "날씨가 참 좋네요.". "<br>";

#인사말3
// 코드를 물어서 함수로 재사용할려면 ???
// 코드블럭 묽을때는 중괄호를 사용
// 코드블럭은 들여쓰기를 해주세요


// 코드 컨벤션 : 스페이스 4칸
function hello()
{
    echo "안녕하세요." . "<br>";
    print "날씨가 참 좋네요.". "<br>";
    echo "저는 대림대학교 아무개 입니다. <br>";

    //출력은 반드시 하나여만 한다.
    return true;
}
//함수의 선언, 단시 코드를 묻는 선언일뿐
// 실행은 되지 않는다.