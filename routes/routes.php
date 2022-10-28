<?php
function getRequires(){
    function constructRequires($Path){
        foreach(scandir($Path) as $file){
            if($file != '..' && $file != '.'){
                if(is_dir($Path.$file)){
                    constructRequires($Path.$file.'/');
                }else{
                    if(pathinfo($file, PATHINFO_EXTENSION) === 'php' && $file !== 'index.php'){
                        // var_dump('Required files: '.$Path.$file);
                        require $Path.$file;
                    }
                }
            }
        }
    }
    constructRequires('../entities/');
    constructRequires('../database/');
    constructRequires('../common/');
    constructRequires('./');
}