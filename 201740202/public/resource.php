<?php


if(!file_exists("html_get_resource")){
      
    function html_get_resource($layout,$path="layout.html"){
        $filename = "../resource/".$layout."/".$path;
        $body = file_get_contents($filename);
        return $body;
    
    }
}
