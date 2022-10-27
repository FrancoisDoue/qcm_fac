<?php
class Question{
    public int $idQuest;
    public string $statements;
    public int $difficult;
    public string $refLesson;
    public array $answer;

    public function __construct($id,$states1,$states2,$diff,$ref){
        $this->idQuest = $id;
        $this->statements = $states1.' '.$states2;
        $this->difficult = $diff;
        $this->refLesson = $ref;
    }
}