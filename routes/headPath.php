<?php
function headPath($string){
    $Directory = new RecursiveDirectoryIterator($string);
    $Iterator = new RecursiveIteratorIterator($Directory);
    foreach($Iterator as $path){
        if(preg_match('/^.+\.css$/',$path)){
            echo '<link rel="stylesheet" href="'.$path->getPathname().'" >';
        }
        if(preg_match('/^.+\.js$/',$path)){
            echo '<script defer src="'.$path->getPathname().'"></script>';
        }
    }
}