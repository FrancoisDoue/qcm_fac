<?php
class Question{
    // public int $idQuest = 0;
    // public string $statement1;
    // public string $statement2 = '';
    // public int $difficult = 0;
    // public string $refLesson = '';
    // public string $cat = 1;
    // public function __construct(int $id, string $stat1, string $stat2, int $diff, string $ref){
    //     $this->idQuest = $id;
    //     $this->statement1 = $stat1;
    //     $this->statement2 = $stat2;
    //     $this->difficult = $diff;
    //     $this->refLesson = $ref;
    // }
    // public function getStatement(){
    //     return $this->statement1.$this->statement2;
    // }
    private static function setStatement(string $stat){
        if(strlen($stat)>(255*2)){
            return false;
        }else if(strlen($stat)>255 && strlen($stat)<=(255*2)){
            $arr = str_split($stat,255);
            return array($arr[0],$arr[1]);
        }else{
            return array($stat,NULL);
        }
    }
    public static function newQuestion(mysqli $db, array $req, array $arr){
        $id = '';
        foreach($arr as $prepare){
            if(!is_array($prepare)){
                $question = self::setStatement($prepare);
                if(is_array($question)){
                    $db->query(sprintf(
                        $req['ADD_QUESTION'],
                        $question[0],
                        $question[1]
                    ));
                    $id = $db->query(sprintf($req['GET_ID'],$question[0]));
                    $id = $id->fetch_assoc();
                    $db->query(sprintf($req['SET_CAT']),$id['id_question'],1);
                }else{
                    exit;
                }
            }else{
                $db->query(sprintf(
                    $req['ADD_ANSWER'],
                    $db->real_escape_string("{$prepare['reponse']}"),
                    $db->real_escape_string($prepare['is_true']),
                    $db->real_escape_string($id['id_question'])
                ));
            }
        }
        $db->close();
        return true;
    }
    public static function getCat(mysqli $db, $req){
        $db = $db->query($req);
        $result = $db->fetch_all(MYSQLI_ASSOC);
        return $result;
        // var_dump($result);
    }
    public static function getAllQuestionBy(mysqli $db, array $cat){

    }
}
class Answer extends Question{

}