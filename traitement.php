<?php
session_start();
if (!isset($_SESSION['donnees'])) {
    $_SESSION['donnees'] = [];
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST['action'] === 'supprimer') {
        $ligne = $_POST['ligne'];
        if (isset($_SESSION['donnees'][$ligne])) {
            unset($_SESSION['donnees'][$ligne]);
            $_SESSION['donnees'] = array_values($_SESSION['donnees']);
        }
    }else {
        $nom_editeur = htmlspecialchars(trim($_POST["nom_editeur"]));
        $prenom_editeur  = htmlspecialchars(trim($_POST["prenom_editeur"]));
        $poste = htmlspecialchars(trim($_POST["poste"]));
        $entreprise = htmlspecialchars(trim($_POST["entreprise"]));
        $lieu_edition = htmlspecialchars(trim($_POST["lieu_edition"]));
        $date_edition = htmlspecialchars(trim($_POST["date_edition"]));
        $nom_etudiant = htmlspecialchars(trim($_POST["nom_etudiant"]));
        $prenom_etudiant = htmlspecialchars(trim($_POST["prenom_etudiant"]));
        $filiere = htmlspecialchars(trim($_POST["filiere"]));
        $niveau = htmlspecialchars(trim($_POST["niveau"]));
        $sexe = htmlspecialchars(trim($_POST["sexe"]));
        $civilite = htmlspecialchars(trim($_POST["civilite"]));
        $_SESSION['donnees'][] = [
            "nom_editeur" => $nom_editeur,
            "prenom_editeur"  => $prenom_editeur,
            "poste" => $poste,
            "entreprise" => $entreprise,
            "lieu_edition" => $lieu_edition,
            "date_edition" => $date_edition,
            "nom_etudiant" => $nom_etudiant,
            "prenom_etudiant" => $prenom_etudiant,
            "filiere" => $filiere,
            "niveau" => $niveau,
            "sexe" => $sexe,
            "civilite" => $civilite,
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Résultats du formulaire</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div id="a">
        <form id="form1" action="traitement.php" method="POST" class="form">
            <img width="100px" src="pigier-benin.png" alt="logo">

            <fieldset id="fieldset-1">
                <legend>Informations générales </legend>

                <div class="div-fieldset-1">
                    <div>
                        <label class="label-champ">Nom du signataire</label>
                        <input class="input-champ" type="text" name="nom_editeur" required
                            placeholder="Saisir le nom du signataire...">
                    </div>
                    <div>
                        <label class="label-champ">Prénom du signataire</label>
                        <input class="input-champ" type="text" name="prenom_editeur" required placeholder="Saisir le prénom...">
                    </div>

                </div>

                <div class="div-fieldset-1">
                    <div>
                        <label class="label-champ">Poste du signataire</label>
                        <input class="input-champ" type="text" name="poste" required placeholder="Saisir le poste du signataire...">
                    </div>


                    <div>
                        <label class="label-champ">Structure d'accueil</label>
                        <input class="input-champ" type="text" name="entreprise" required
                            placeholder="Saisir le nom de la structure...">
                    </div>
                </div>

                <div class="div-fieldset-1">
                    <div>
                        <label class="label-champ">Lieu d'édition</label>
                        <input class="input-champ" type="text" name="lieu_edition" required
                            placeholder="Saisir le lieu d'édition...">
                    </div>

                    <div>
                        <label class="label-champ">Date d'édition</label>
                        <input class="input-champ" type="date" name="date_edition" required>
                    </div>
                </div>
            </fieldset>

            <fieldset id="fieldset-2">
                <legend>Informations académiques</legend>

                <div class="div-fieldset-2">
                    <div>
                        <label class="label-champ">Nom de l'étudiant</label>
                        <input class="input-champ" type="text" name="nom_etudiant" required
                            placeholder="Saisir le nom de l'étudiant...">
                    </div>

                    <div>
                        <label class="label-champ">Prénoms de l'étudiant</label>
                        <input class="input-champ" type="text" name="prenom_etudiant" required placeholder="Saisir le prénom de l'étudiant...">
                    </div>
                </div>

                <div class="div-fieldset-2" id="div-filiere">
                    <div>
                        <label class="label-select">Filière</label>
                        <select class="input-select" name="filiere" required>
                            <option value="Développement Web">Développement web</option>
                            <option value="Création Digitale">Création digitale</option>
                            <option value="Communication Digitale">Communication digitale</option>
                            <option value="Génie Civil">Génie Civil</option>
                            <option value="Cybersécurité">Cybersécurité</option>
                        </select>
                    </div>

                    <div>
                        <label class="label-select">Niveau</label>
                        <label><input type="radio" name="niveau" value="1ère année" required> 1ère année</label>
                        <label><input type="radio" name="niveau" value="2ème année"> 2ème année</label>
                        <label><input type="radio" name="niveau" value="3ème année"> 3ème année</label>
                    </div>
                </div>

                <div class="div-select">
                    <div>
                        <label class="label-champ">Sexe</label>
                        <select class="sexe" name="sexe" required>
                            <option value="Masculin">Masculin</option>
                            <option value="Féminin">Féminin</option>
                        </select>
                    </div>

                    <div>
                        <label class="label-champ">Civilité</label>
                        <select class="civilite" name="civilite" required>
                            <option value="M.">M.</option>
                            <option value="Mme.">Mme.</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <div class="div-button">
                <button type="submit" name="action">Enregistrer</button>
                <button type="reset">Réinitialiser</button>

            </div>
        </form>
    </div>
    <table>
        <tr>
            <td>#</td>
            <td>Nom étudiant</td>
            <td>Prénoms étudiant</td>
            <td>Filière</td>
            <td>Niveau</td>
            <td>Sexe</td>
            <td>Civilité</td>
            <td>Nom du signataire</td>
            <td>Prénom du signataire</td>
            <td>Poste</td>
            <td>Structure d'accueil</td>
            <td>Lieu d'édition</td>
            <td>Date d'édition</td>
            <td>Action</td>
        </tr>

        <?php
        $i = 1;
        foreach ($_SESSION['donnees'] as $ligne) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $ligne["nom_etudiant"]; ?></td>
                <td><?php echo $ligne["prenom_etudiant"]; ?></td>
                <td><?php echo $ligne["filiere"]; ?></td>
                <td><?php echo $ligne["niveau"]; ?></td>
                <td><?php echo $ligne["sexe"]; ?></td>
                <td><?php echo $ligne["civilite"]; ?></td>
                <td><?php echo $ligne["nom_editeur"]; ?></td>
                <td><?php echo $ligne["prenom_editeur"]; ?></td>
                <td><?php echo $ligne["poste"]; ?></td>
                <td><?php echo $ligne["entreprise"]; ?></td>
                <td><?php echo $ligne["lieu_edition"]; ?></td>
                <td><?php echo $ligne["date_edition"]; ?></td>

                <td>
                    <form action="traitement.php" method="POST">
                        <input style="display: none;" name="ligne" value="<?php echo $i - 1; ?>">
                        <button type="submit" name="action" value="modifier">Modifier</button>
                    </form>
                    <?php $index = $i - 1; ?>
                    <form action="traitement.php" method="POST">
                        <input style="display: none;" name="ligne" value="<?php echo $i - 1; ?>">
                        <button type="submit" name="action" value="supprimer">Supprimer</button>
                    </form>
                    <form action="fiche.php" method="POST">
                        <input style="display:none;" name="nom_etudiant" value="<?php echo $ligne['nom_etudiant']; ?>">
                        <input style="display:none;" name="prenom_etudiant" value="<?php echo $ligne['prenom_etudiant']; ?>">
                        <input style="display:none;" name="filiere" value="<?php echo $ligne['filiere']; ?>">
                        <input style="display:none;" name="niveau" value="<?php echo $ligne['niveau']; ?>">
                        <input style="display:none;" name="sexe" value="<?php echo $ligne['sexe']; ?>">
                        <input style="display:none;" name="civilite" value="<?php echo $ligne['civilite']; ?>">
                        <input style="display:none;" name="nom_editeur" value="<?php echo $ligne['nom_editeur']; ?>">
                        <input style="display:none;" name="prenom_editeur" value="<?php echo $ligne['prenom_editeur']; ?>">
                        <input style="display:none;" name="poste" value="<?php echo $ligne['poste']; ?>">
                        <input style="display:none;" name="entreprise" value="<?php echo $ligne['entreprise']; ?>">
                        <input style="display:none;" name="lieu_edition" value="<?php echo $ligne['lieu_edition']; ?>">
                        <input style="display:none;" name="date_edition" value="<?php echo $ligne['date_edition']; ?>">
                        <button type="submit">Prévisualiser</button>
                    </form>
                    <form action="fiche.php" method="POST">
                        <button type="submit">Imprimer</button>
                    </form>

                </td>

            </tr>
        <?php
            $i = $i + 1;
        }
        ?>
    </table>
</body>

</html>