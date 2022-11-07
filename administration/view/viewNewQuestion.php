<?php
function viewNewQuestion(){
    if(isset($_GET['ques'])){
        if($_GET['ques']=='new'){
            if(isset($_GET['end'])){
                if($_GET['end'] === 'true'){
                    prepareNewQuestion($_SESSION);
                }else{
                    unset($_SESSION['prepare']);
                }
                header('Location: /administration/?maintool=question&ques=new&type='.$_GET['type']);
            }
            ?>
        <div id="questionAjout">
            <nav>
                <a href="/administration/?maintool=question&ques=new&type=2"><button>Vrai ou faux?</button></a>
                <a href="/administration/?maintool=question&ques=new&type=3"><button>Question à 3 réponses</button></a>
                <a href="/administration/?maintool=question&ques=new&type=4"><button>Question à 4 réponses</button></a>
            </nav>
            <div>
                <h2>Ajouter une question</h2>
                <form action="<?=$_SERVER['REQUEST_URI']?>&confirm=true" method="post">
                    <div>
                        <textarea name="enonce" id="enonce" placeholder="énoncé de la question"></textarea>
                    </div>
                    <div>
                        <input type="checkbox" name="istrue-1" value="reponse-1">
                        <textarea name="reponse-1"></textarea>
                    </div>
                    <div>
                        <input type="checkbox" name="istrue-2" value="reponse-2">
                        <textarea name="reponse-2"></textarea>
                    </div>
                    <?php 
                    if(isset($_GET['type'])){
                        if($_GET['type']>2){
                            echo '<div>
                                    <input type="checkbox" name="istrue-3" value="reponse-3">
                                    <textarea name="reponse-3"></textarea>
                                </div>';
                        }
                        if($_GET['type']>3){
                            echo '<div>
                                    <input type="checkbox" name="istrue-4" value="reponse-4">
                                    <textarea name="reponse-4"></textarea>
                                </div>';
                        }
                    }else{
                        header('Location: /administration/?maintool=question&ques=new&type=2');
                    }
                ?>
                    <button type="submit">Ajouter</button>
                </form>
            </div>
        </div>
        <?php 
    if(isset($_GET['confirm'])){
        if($_GET['confirm'] && !empty($_POST)){
            $verif = true;
            foreach(array_keys($_POST) as $inputVal){
                if($_POST[$inputVal]){
                    $verif = false;
                }
            }
            if($verif){?>
            <div id="confirm">
                <form action="/administration/?maintool=question&ques=new&type=<?=$_GET['type']?>&end=true" method="post">
                    <h2>Voulez-vous ajouter cette question?</h2>
                    <?php
                    pushArrQues($_POST);
                    ?>
                    <div>
                        <a href="/administration/?maintool=question&ques=new&type=<?=$_GET['type']?>&end=false">Annuler</a>
                        <button class="submit" type="submit">Confirmer</button>
                    </div>
                </form>
            </div>
        <?php 
            }else{?>
                <div class="errordiv">
                    <h2 class="error">Tous les champs doivent être remplis</h2>
                </div>
            <?php 
                // header('Refresh:2; url='.$_SERVER['REQUEST_URI']);
            }
                }
            }
        ?>
    <?php
        }
    }else{
        echo 'vide';
    }
}