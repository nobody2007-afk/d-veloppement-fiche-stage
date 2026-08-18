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
$sexe_signataire = $_POST['sexe_signataire'];
$civilite        = $_POST['civilite'];
$identification;
$suite;
$simple;
$bro;
$logique;

if ($sexe_signataire === 'Masculin') {
    $identification = 'Monsieur';
} else {
    $identification = 'Madame';
}

if ($sexe_signataire === 'Masculin') {
    $suite = 'le Directeur Général';
} else {
    $suite = 'la Directrice Générale';
}

if ($sexe === 'Masculin') {
    $simple = 'un de nos apprenants';
} else {
    $simple = 'une de nos apprenantes';
}

if ($sexe === 'Masculin') {
    $bro = 'l\'apprenant est couvert';
} else {
    $bro = 'l\'apprenante est couverte';
}

if ($sexe_signataire === 'Masculin') {
    $logique = 'chargé';
} else {
    $logique = 'chargée';
}

$voyelles = ['a', 'e', 'i', 'o', 'u', 'y', 'h'];
$premiere_lettre = mb_strtolower(mb_substr(trim($poste), 0, 1, 'UTF-8'), 'UTF-8');

if (in_array($premiere_lettre, $voyelles)) {
    $article_poste = "L'";
} elseif ($sexe_signataire === 'Masculin') {
    $article_poste = "Le ";
} else {
    $article_poste = "La ";
}

$affichage_date = IntlDateFormatter::formatObject(new DateTime($date_edition), 'd MMMM yyyy', 'fr_FR'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/eb6368b0a2.js" crossorigin="anonymous"></script>
    <title>Présentation du Stagiaire</title>
   
</head>

<body>
    <div id="fiche-imprimer">
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
                <div id="bande-bleu-header2"></div>
                <div id="bande-bleu-header"></div>
            </div>
        </header>

        <section id="page">
            <aside class="aside-left"><img src="eduservices.jpg" alt=""></aside>
            <aside class="aside-right">
                <img src="vue.png" alt="">
                <img src="auf.png" alt="">
                <img src="office.jpg" alt="">
                <img src="cisco.png" alt="">
                <img src="ets.png" alt="">
            </aside>
            <p><em><?php echo $lieu_edition, ', le ' . $affichage_date; ?></em></p>

            <div id="entreprise">
                <label id="text">Entreprise</label>
                <input class="form-control" type="text" name="entreprise" value="<?php echo $entreprise; ?>" readonly>
            </div>

            <div id="presentation">
                <p id="paragraph">PRESENTATION DU STAGIAIRE</p>
            </div>

            <p><strong><?php echo $identification; ?>,</strong></p>

            <p>Vous avez bien voulu accepter de prendre en stage <?php echo $simple; ?> et nous vous remercions.</p>

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
                        value="<?php echo $filiere . ' ' . $niveau; ?>" readonly>
                </div>

                <p id="confirmation"> Nous vous confirmons :
                <ul>
                    <li>qu'aucune rémunération du stagiaire n'est exigée</li>
                    <li>que ce stage fait partie de sa formation et que <?php echo $bro; ?> par sa police d'assurance.</li>
                </ul>
                </p>
                <p><?php echo $article_poste; ?><strong><?php echo $poste; ?></strong> de PIGIER-BENIN est <?php echo $logique; ?> du suivi de ce stagiaire.</p>
                <p>Nous vous remercions vivement de bien vouloir participer de façon active à sa formation et vous prions d'agréer, <strong><?php echo $identification; ?> <?php echo $suite; ?> </strong>, l'expression de notre parfaite considération.</p>
                <p id="attache"><strong><?php echo $poste; ?></strong></p>
                <p id="signature-nom"><strong><?php echo $prenom_editeur . ' ' . $nom_editeur; ?></strong></p>
            </div>
        </section>

        <footer>
            <div class="bande-footer">
                <div id="bande-bleu-footer"></div>
                <div id="bande-bleu-footer2"></div>
                <div id="bande-or-footer"></div>
            </div>
            <div id="div1">
                <p id="ecole-footer">Une Ecole du Groupe Eduservices (France)</p>
            </div>
            <div class="footer-content">
                <div class="footer-section">
                    <p><span id="span1"></span> ISTEG SARL au Capital de 1.000 000 FCFA / RCCM : RB-COTONOU B 8049</p>
                </div>
                <div class="footer-section">
                    <p><i class="fa-solid fa-location-dot" style="color: hsv(232, 90%, 87%);"></i> C/1270 Rue 320 Immeuble PIGIER-BENIN, AYIDOTE-AGONTIKON</p>
                </div>
                <div class="footer-section">
                    <p><i class="fa-solid fa-envelope" style="color: hsv(232, 90%, 87%);"></i> 01 BP 2411 COTONOU RB</p>
                </div>
            </div>
            <div class="footer-content2">
                <div class="footer-section2">
                    <p> <i class="fa-solid fa-phone"></i>(229) 21 30 29 06 / 97 84 67 28 / 97 58 41 38</p>
                </div>
                <div class="footer-section2">
                    <p><i class="fa-solid fa-globe" style="color: hsv(232, 90%, 87%);"></i> www.pigier-benin.com</p>
                </div>
                <div class="footer-section2">
                    <p><i class="fa-brands fa-facebook" style="color: hsv(232, 90%, 87%);"></i> pigierbeninofficiel</p>
                </div>
                <div class="footer-section newsletter">
                    <p><span id="span2">@</span> pigier.cotonou@pigierbenin.com / relations.marketing@pigierbenin.com</p>
                </div>
            </div>
        </footer>
    </div>
    <?php if (isset($_POST['imprimer'])): ?>
        <script>
            window.onload = async function() {
                const {
                    jsPDF
                } = window.jspdf;
                const element = document.getElementById('fiche-imprimer');

                const canvas = await html2canvas(element, {
                    scale: 3,
                    useCORS: true,
                    logging: false,
                    backgroundColor: '#ffffff'
                });

                const imgData = canvas.toDataURL('image/jpeg', 1.0);
                const pdf = new jsPDF('p', 'mm', 'a4');
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

                pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('fiche_stagiaire.pdf');
            };
        </script>
    <?php endif; ?>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- <script src="script.js"></script> -->
</body>

</html>