<?php
function viewAffCat(){
    if(!isset($_SESSION['AFFICHE_CAT'])){
        $_SESSION['AFFICHE_CAT']['supercat'] = Question::getCat(ConnectDb::mysqliDb(),reqCategorie('ALL_S_CAT'));
        $_SESSION['AFFICHE_CAT']['categorie'] = Question::getCat(ConnectDb::mysqliDb(),reqCategorie('ID_S_CAT'));
        var_dump($_SESSION['AFFICHE_CAT']);
    }else{
        // /* TO DELETE AFTER TEST */ unset($_SESSION['AFFICHE_CAT']);
        var_dump($_SESSION['AFFICHE_CAT']);
    }
?>
    <div id="affichageCat">
        <form id="catSelector" action="/administration/?maintool=question&ques=cataff&" method="get">
            <div>
                <label for="superCat">Sélection par thèmes</label>
                <select name="superCat" id="">
                    <?php 
                    foreach($_SESSION['AFFICHE_CAT']['supercat'] as $cat){
                        if($cat['lib_supercat'] == 'DEFAULT'){
                            $cat['lib_supercat'] = 'Sélectionnez un thème';
                        }
                        echo '<option value="'.$cat['id_supercat'].'">'.$cat['lib_supercat'].'</option>';
                    }
                    ?>
                    
                </select>
            </div>
            <div>
                <label for="categorie">Sélection de la catégorie</label>
                <select name="categorie" id="">
                    <?php
                    foreach($_SESSION['AFFICHE_CAT']['categorie'] as $cat){
                        if($cat['lib_cat'] == 'CAT_DEFAULT'){
                            $cat['lib_cat'] = 'Par défaut';
                        }
                        echo '<option value="'.$cat['id_cat'].'">'.$cat['lib_cat'].'</option>';
                    }
                    ?>
                    <!-- <option value="defaultcat"> -- TEST CAT -- </option> -->
                </select>
            </div>
        </form>
        <div>
            <?//=var_dump(Question::getAllQuestionBy(ConnectDb::mysqliDb(),reqQuestionByCat(1)))?>

        </div>
    </div>
<?php }