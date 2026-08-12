<?php

$nom_editeur     = $_POST['nom_editeur'];
$prenom_editeur  = $_POST['prenom_editeur'];
$poste           = $_POST['poste'];
$entreprise      = $_POST['entreprise'];
$lieu_edition    = $_POST['lieu_edition'];
$date_edition    = $_POST['date_edition'];
$nom_etudiant    = $_POST['nom_etudiant'];
$prenom_etudiant = $_POST['prenom_etudiant'];
$filiere         = $_POST['filiere'];
$niveau          = $_POST['niveau'];
$sexe            = $_POST['sexe'];
$civilite        = $_POST['civilite'];

$affichage_date = date('d/m/Y', strtotime($date_edition));
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation du Stagiaire</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="pigier-benin.png" width="150" height="50" alt="Logo pigier" id="logopigier">
            </div>
            <div id="header-right">
                <div class="header-right">
                    <div class="iso">
                        <h1 id="ecole">Ecole Certifiée ISO</h1>
                        <p id="iso">9001/2015 <br>21001/2018</p>
                    </div>
                    <div class="iso1">
                        <p id="formation">Formation & Placement des Apprenants</p>
                        <p id="certification">APAVE Certification - Certificat N°312032/r1</p>
                    </div>
                </div>

                <div class="logo1">
                    <img src="logo1.jpeg" width="100" height="100" alt="Logo ISO" id="logo">
                </div>
            </div>
        </div>
        <div class="bande-header">
            <div id="bande-or-header"></div>
            <div id="bande-bleu-header"></div>
        </div>
    </header>

    <section id="page">
        <p><?php echo $lieu_edition, ',le ' . $affichage_date; ?></p>

        <div id="entreprise">
            <label id="text">Entreprise</label>
            <input class="form-control" type="text" name="entreprise" value="<?php echo $entreprise; ?>" readonly>
        </div>

        <div id="presentation">
            <p id="paragraph">PRESENTATION DU STAGIAIRE</p>
        </div>

        <p><strong>Monsieur/Madame,</strong></p>

        <p>Vous avez bien voulu accepter de prendre en stage un(e) de nos apprenant(e)s et nous vous remercions.</p>

        <div id="presentation-details">
            <div class="form-group2">
                <label class="information">Nous avons le plaisir de vous présenter :</label>
                <input class="form-control2" type="text" name="nom_etudiant"
                    value="<?php echo $civilite . ' ' . $nom_etudiant . ' ' . $prenom_etudiant; ?>"
                    readonly>
            </div>

            <div class="form-group2">
                <label class="information" id="filiere-label">De la filière</label>
                <input class="form-control2" type="text" name="filiere"
                    value="<?php echo $filiere . ' - ' . $niveau; ?>" readonly>
            </div>

            <p id="confirmation">Nous vous confirmons :
            <ul>
                <li>qu'aucune rémunération du stagiaire n'est exigée</li>
                <li>que ce stage fait partie de sa formation et que l'apprenant(e) est couvert(e) par sa police d'assurance.</li>
            </ul>
            </p>

            <p>Le <strong><?php echo $poste; ?></strong>est chargé(e) du suivi de ce stagiaire.</p>

            <p>Nous vous remercions vivement de bien vouloir participer de façon active à sa formation et vous prions d'agréer, <strong>Monsieur le Directeur Général</strong>, l'expression de notre parfaite considération.</p>

            <p id="attache"><strong><?php echo $poste; ?></strong></p>

            <p id="signature-nom"><strong><u><?php echo $prenom_editeur . ' ' . $nom_editeur; ?></u></strong></p>
        </div>
    </section>

    <footer>
        <div class="bande-footer">
            <div id="bande-bleu-footer"></div>
            <div id="bande-or-footer"></div>
        </div>
        <div id="div1">
            <p id="ecole-footer">Une Ecole du Groupe Eduservices (France)</p>
        </div>
        <div class="footer-content">
            <div class="footer-section">
                <p>ISTEG SARL au Capital de 1.000 000 FCFA / RCCM : RB-COTONOU B 8049</p>
            </div>
            <div class="footer-section">
                <p><img src="map.png" alt="" width="10px" height="15px"> C/1270 Rue 320 Immeuble PIGIER-BENIN, AYIDOTE-AGONTIKON</p>
            </div>
            <div class="footer-section">
                <p>01 BP 2411 COTONOU RB</p>
            </div>
        </div>
        <div class="footer-content2">
            <div class="footer-section2">
                <p>(229) 21 30 29 06 / 97 84 67 28 / 97 58 41 38</p>
            </div>
            <div class="footer-section2">
                <p><img src="internet.png" alt="" width="25px" height="15px" id="internet">www.pigier-benin.com</p>
            </div>
            <div class="footer-section2">
                <p>pigierbeninofficiel</p>
            </div>
            <div class="footer-section newsletter">
                <p>pigier.cotonou@pigierbenin.com / relations.marketing@pigierbenin.com</p>
            </div>
        </div>
    </footer>
</body>

</html>