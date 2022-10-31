<?php
function asideAdm(){ ?>
    <div id="sider">
        <aside id="aside">
            <a href="?maintool=question"><button>Gestion des questions</button></a>
            <a href="?maintool=qcm"><button>Gestion des QCMs</button></a>
            <a href="?maintool=groupe"><button>Gestion des groupes</button></a>
            <a href="?maintool=epreuve"><button>Programmer une épreuve</button></a>
            <a href="?maintool=resultat"><button>Affichage des résultats</button></a>
            <a href="/disconnect/"><button>Se déconnecter</button></a>
        </aside>
    </div>
<?php }
