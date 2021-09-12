<?php require_once "inc/header.inc.php"; //inclusion du header 
?>
<?php
// ---------------------------------------------------------------------
// FORMULAIRE CONTACT
if ($_POST) {

    foreach ($_POST as $indice => $valeur) {

        $_POST[$indice] = htmlentities(addslashes($valeur));
    }

    if (!empty($_POST["telephone"])) {

        if (!is_numeric($_POST['telephone'])) {

            $error .= '
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            Vous devez saisir un nombre !
                        </div>
                </div>
            </div>
            ';
        }

        if (strlen($_POST['telephone']) != 10) {

            $error .= '
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            Vous devez renseigner un numéro à 10 chiffres !
                        </div>
                </div>
            </div>
            ';
        }
    }

    $position_arobase = strpos($_POST['mail'], '@');
    if ($position_arobase === false)
        $error .= '<p>Votre email doit comporter un arobase.</p>';
    else {
        ini_set("SMTP", "nejma-aidoun.fr");
        $to = 'site-vitrine@nejma-aidoun.fr';
        $message= 'Nom: '.$_POST['nom'].". ". 'Prénom: '.$_POST['prenom'].". ". 'Téléphone: '.$_POST['telephone'].'. '. 'Message: '.$_POST['message'].'.' ;
        $retour = mail($to, 'Envoi depuis la page Contact', $message);
        if ($retour){
            $content .= 
                '<div class="d-flex justify-content-center">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                        Merci de m\'avoir contactée. Je vous répondrai très vite.
                        </div>
                </div>
            </div>';
            }
        else{
            $error .= '
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div>
                            Erreur !
                        </div>
                </div>
            </div>
            ';
        }
        
    }

    if (empty($error)) {

        $pdo->exec("INSERT INTO contact(nom, prenom, telephone, mail, message)

							VALUES( 
									'$_POST[nom]',
                                    '$_POST[prenom]',
									'$_POST[telephone]',
									'$_POST[mail]',
									'$_POST[message]'
							)
				");
    }
}
// ---------------------------------------------------------------------
// CV


?>



<section id="profile" class="fondVert">
    <img src="assets/img/profileNejma.png" alt="Photo de Nejma Aidoun" id="nejmaProfile">
    <h2 class="titre">Aidoun Nejma</h2>
    <div class="trait"></div>
    <h3 class="titre">Développeuse Web</h3>
    <br>
    <p> (recherche stage à partir du 01/10/21)</p>
</section>

<section id="portfolio">
    <h2 class="titre">Portfolio</h2>
    <div class="trait"></div>
    <div class="rangee">
        <div>
            <a href="https://github.com/AidounNejma">
                <img src="assets/img/github.jpeg" alt="github" class="imagePortfolio">
            </a>
        </div>
        <div>
            <a href="https://angular.nejma-aidoun.fr/">
                <img src="assets/img/shonenJumpSite.jpeg" alt="Site de Shonen Jump" class="imagePortfolio">
            </a>
        </div>
        <div>
            <a href="">
        
            </a>
        </div>
    </div>
    <div class="rangee">
        <div>
            <a href="">
            </a>
        </div>
        <div>
            <a href="">
            
            </a>
        </div>
        <div>
            <a href="">
                
            </a>
        </div>
    </div>
</section>

<section id="apropos" class="fondVert">
    <h2 class="titre"> A propos</h2>
    <div class="trait"></div>
    <div class="rangee">
        <div>
            <h3>Formation</h3>
            <p> J'ai un parcours plutôt atypique; généralement assez "touche-à-tout, j'ai débuté par un BTS SP3S que je n'ai pas pu terminer, les métiers ne me correspondant pas vraiment. </p>
                <p>J'ai ensuite continué mesétudes en licence LLCER Anglais, et à la suite de quoi, j'ai voulu débuter un bachelor en communication (les métiers du web m'intéressant de plus en plus). </p>
                    <p>Malheureusement, faute d'alternance, j'ai décidé,à nouveau, de me réorienter cette fois-ci en programmation.</p>
        </div>
        <div>
            <h3>Expérience</h3>
            <p> En pleine reconversion professionnelle, j'ai pu auparavant occuper les postes de Responsable de
                Communication en alternance dans une start-up parisienne.</p>
                <p>J'ai été cheffe de caisse à temps partiel à Monoprix pendant mes études.</p> 
                    <p>J'ai aussi pu occuper le poste de stagiaire coordinatrice de service d'aide à l'enfance/famille dans une association maubeugeoise.</p>
        </div>
    </div>
    <a href="documents/CV_Aidoun_Nejma.pdf" target="_blank" id="lienCV">
        <i class="fas fa-download"></i> CV</a>
    <!--target _blank permet d'ouvrir le lien dans un nouvel onglet-->
</section>

<section id="contact">
    <h2 class="titre">Contactez moi</h2>
    <div class="trait"></div>

    <?= $content ?>
    <?= $error ?>

    <form method="post">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom">
        <!--id et for doivent avoir le même nom pour les relier entre eux. ainsi l'utilisateur cliquera directement sur "Nom" et la case sera en surbrillance-->

        <label for="prenom">Prenom</label>
        <input type="text" id="prenom" name="prenom">

        <label for="tel">Téléphone</label>
        <input type="tel" id="tel" name="telephone" pattern="^[0-9]{10}$" maxlength="10" required>
        <!--permet de n'autoriser que les chiffre + d'ouvrir directement le clavier numérique-->

        <label for="mail">Mail</label>
        <input type="email" id="mail" name="mail" required>

        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>

        <input type="submit" value="Envoyer !" id="submit">
    </form>
</section>

<?php require_once "inc/footer.inc.php"; //inclusion du footer 
?>