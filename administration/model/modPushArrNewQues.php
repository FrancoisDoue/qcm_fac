<?php
function pushArrQues(array $post) :void {
    $tabRequest = array();
    $keys = array_keys($post,true);
    for($i = 0; $i < count($keys); $i++){
        if(preg_match('/^istrue/',$keys[$i])){
            $tabRequest[$keys[$i+1]] = array(
                'reponse' => $post[$keys[$i+1]],
                'is_true' => '1'
            );
            print(
                '<textarea readonly class="'.explode('-',$keys[$i+1])[0].'-true" name="'.$keys[$i+1].'">'
                    .$post[$keys[$i+1]].
                '</textarea>'
            );
            $i++;
        }else{
            if(preg_match('/^enonce$/',$keys[$i])){
            $tabRequest[$keys[$i]] = $post[$keys[$i]];
            }else{
                $tabRequest[$keys[$i]] = array(
                    'reponse' => $post[$keys[$i]],
                    'is_true' => '0'
                );
            }
            print(
                '<textarea readonly class="'.explode('-',$keys[$i])[0].'-false" name="'.$keys[$i].'">'
                    .$post[$keys[$i]].
                '</textarea>'
            );
        }
    }
    $post = array();
    $_SESSION['prepare'] = $tabRequest;
}