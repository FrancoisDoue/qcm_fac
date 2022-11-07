<?php
function mainQuestion($get = 'default'){
    $setUri = explode('&',$_SERVER['REQUEST_URI'])[0];
    $navVersion = array(
        'question' =>   '<nav>
                            <a href="'.$setUri.'&ques=new"><button>Ajouter une nouvelle question</button></a>
                            <a href="'.$setUri.'&ques=mod"><button>Modifier une question</button></a>
                            <a href="'.$setUri.'&ques=catadd"><button>Ajouter une catégorie</button></a>
                            <a href="'.$setUri.'&ques=cataff"><button>Affichage par catégorie</button></a>
                        </nav>',
        'qcm' =>    '<nav>
                        <a href="'.$setUri.'&qcm=new"><button>Créer un nouveau QCM</button></a>
                        <a href="'.$setUri.'&qcm=mod"><button>Modifier un QCM</button></a>
                        <a href="'.$setUri.'&qcm=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&qcm=test"><button>Test button</button></a>
                    </nav>',
        'groupe' => '<nav>
                        <a href="'.$setUri.'&groupe=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&groupe=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&groupe=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&groupe=test"><button>Test button</button></a>
                    </nav>',
        'epreuve' => '<nav>
                        <a href="'.$setUri.'&eprv=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&eprv=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&eprv=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&eprv=test"><button>Test button</button></a>
                    </nav>',
        'resultat' => '<nav>
                        <a href="'.$setUri.'&result=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&result=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&result=test"><button>Test button</button></a>
                        <a href="'.$setUri.'&result=test"><button>Test button</button></a>
                    </nav>'
    );?>
    <div id="maindiv">
        <?= $navVersion[$get]?>
        <main id="main">
        <?php
        if(isset($_GET['ques'])){
            switch($_GET['ques']){
                case 'new':
                    viewNewQuestion();
                    break;
                case 'mod':

                    break;
                case 'catadd':

                    break;
                case 'cataff':
                    viewAffCat();
                    break;
            }
        }
        ?>
        </main>
    </div>
<?php }