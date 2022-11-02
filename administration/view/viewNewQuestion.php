<?php
function viewNewQuestion(){
    if(isset($_GET['ques'])){
        if($_GET['ques']==='new'){
            ?>
        <div id="questionAjout">
            <nav>
                <a href="/administration/?maintool=question&ques=new&type=2"><button>Vrai ou faux?</button></a>
                <a href="/administration/?maintool=question&ques=new&type=3"><button>Question à 3 réponses</button></a>
                <a href="/administration/?maintool=question&ques=new&type=4"><button>Question à 4 réponses</button></a>
            </nav>
            <div>
                <h2>Ajouter une question</h2>
                <form action="" method="post">
                    <div>
                        <textarea name="enonce" id="enonce" placeholder="énoncé de la question"></textarea>
                    </div>
                    <div>
                        <textarea name="reponse-1"></textarea>
                        <input type="checkbox" name="istrue-1" value="reponse-1">
                    </div>
                    <div>
                        <textarea name="reponse-2"></textarea>
                        <input type="checkbox" name="istrue-2" value="reponse-2">
                    </div>
                    <?php 
                    if(isset($_GET['type'])){
                        if($_GET['type']>2){
                            echo '<div>
                                    <textarea name="reponse-3"></textarea>
                                    <input type="checkbox" name="istrue-3" value="reponse-3">
                                </div>';
                        }
                        if($_GET['type']>3){
                            echo '<div>
                                    <textarea name="reponse-4"></textarea>
                                    <input type="checkbox" name="istrue-4" value="reponse-4">
                                </div>';
                        }
                    }else{
                        // header('Location: /administration/?maintool=question&ques=new&type=2');
                    }
                    ?>
                </form>
            </div>
        </div>
    <?php
        var_dump($_POST);
        var_dump($_ENV);
        }
    }else{
        echo 'vide';
    }
}