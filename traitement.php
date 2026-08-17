<?php
session_start();
if (!isset($_SESSION['donnees'])) {
    $_SESSION['donnees'] = [];
}
$mode_modification = false;
$ligne_modification = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action'])) {

    if ($_POST['action'] === 'supprimer') {

        if (isset($_POST['ligne'])) {
            unset($_SESSION['donnees'][$_POST['ligne']]);
        }
    } elseif ($_POST['action'] === 'modifier') {

        $ligne_modification = $_POST['ligne'];

        if (isset($_SESSION['donnees'][$ligne_modification])) {
            $mode_modification = true;
        }
    } elseif ($_POST['action'] === 'enregistrer_modification') {

        $ligne = $_POST['ligne'];

        if (isset($_SESSION['donnees'][$ligne])) {

            $_SESSION['donnees'][$ligne] = [
                "nom_editeur" => htmlspecialchars(trim($_POST["nom_editeur"])),
                "prenom_editeur" => htmlspecialchars(trim($_POST["prenom_editeur"])),
                "poste" => htmlspecialchars(trim($_POST["poste"])),
                "entreprise" => htmlspecialchars(trim($_POST["entreprise"])),
                "lieu_edition" => htmlspecialchars(trim($_POST["lieu_edition"])),
                "date_edition" => htmlspecialchars(trim($_POST["date_edition"])),
                "nom_etudiant" => htmlspecialchars(trim($_POST["nom_etudiant"])),
                "prenom_etudiant" => htmlspecialchars(trim($_POST["prenom_etudiant"])),
                "filiere" => htmlspecialchars(trim($_POST["filiere"])),
                "niveau" => htmlspecialchars(trim($_POST["niveau"])),
                "sexe" => htmlspecialchars(trim($_POST["sexe"])),
                "sexe_signataire" => htmlspecialchars(trim($_POST["sexe_signataire"])),
                "civilite" => htmlspecialchars(trim($_POST["civilite"]))
            ];
        }
    } elseif ($_POST['action'] === 'enregistrer') {
        if (isset($_POST["nom_etudiant"]) && isset($_POST["prenom_etudiant"])) {
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
            $sexe_signataire = htmlspecialchars(trim($_POST["sexe_signataire"]));
            $civilite = htmlspecialchars(trim($_POST["civilite"]));
            $id = "cpt_" . (count($_SESSION['donnees']) + 1);
            $_SESSION['donnees'][$id] = [
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
                "sexe_signataire" => $sexe_signataire,
                "civilite" => $civilite,
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Résultats du formulaire</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/eb6368b0a2.js" crossorigin="anonymous"></script>
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
                            placeholder="Saisir le nom du signataire..."
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['nom_editeur'] : ''; ?>">

                    </div>
                    <div>
                        <label class="label-champ">Prénom du signataire</label>
                        <input class="input-champ" type="text" name="prenom_editeur" required
                            placeholder="Saisir le prénom..."
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['prenom_editeur'] : ''; ?>">

                    </div>
                </div>

                <div class="div-fieldset-1">
                    <div>
                        <label class="label-champ">Poste du signataire</label>
                        <input class="input-champ" type="text" name="poste" required
                            placeholder="Saisir le poste du signataire..."
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['poste'] : ''; ?>">
                    </div>

                    <div>
                        <div>
                            <label class="label-champ">Sexe de signataire</label>
                            <select class="input-champ" name="sexe_signataire" required>
                                <option value="">Sélectionner le sexe</option>
                                <option value="Masculin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe_signataire'] == 'Masculin') {
                                                                echo 'selected';
                                                            } ?>> Masculin</option>
                                <option value="Féminin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe_signataire'] == 'Féminin') {
                                                            echo 'selected';
                                                        } ?>>Féminin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="div-fieldset-1">
                    <div>
                        <label class="label-champ">Lieu d'édition</label>
                        <input class="input-champ" type="text" name="lieu_edition" required
                            placeholder="Saisir le lieu d'édition..."
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['lieu_edition'] : ''; ?>">
                    </div>

                    <div>
                        <label class="label-champ">Date d'édition</label>
                        <input class="input-champ" type="date" name="date_edition" required
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['date_edition'] : ''; ?>">
                    </div>
                </div>

                <div id="structure">
                    <div>
                        <label class="label-champ">Structure d'accueil</label>
                        <input class="input-champ" type="text" name="entreprise" required
                            placeholder="Saisir le nom de la structure..."
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['entreprise'] : ''; ?>">
                    </div>
                </div>

            </fieldset>

            <fieldset id="fieldset-2">
                <legend>Informations académiques</legend>

                <div class="div-fieldset-2">
                    <div>
                        <label class="label-champ">Nom de l'étudiant</label>
                        <input class="input-champ" type="text" name="nom_etudiant" required
                            placeholder="Saisir le nom de l'étudiant..."
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['nom_etudiant'] : ''; ?>">
                    </div>

                    <div>
                        <label class="label-champ">Prénoms de l'étudiant</label>
                        <input class="input-champ" type="text" name="prenom_etudiant" required
                            placeholder="Saisir le prénom de l'étudiant..."
                            value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['prenom_etudiant'] : ''; ?>">
                    </div>
                </div>

                <div class="div-fieldset-2" id="div-filiere">
                    <div>
                        <label class="label-select">Filière</label>
                        <select class="input-select" name="filiere" required>
                            <option value="Développement Web" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Développement Web') echo 'selected'; ?>>Développement web</option>
                            <option value="Création Digitale" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Création Digitale') echo 'selected'; ?>>Création digitale</option>
                            <option value="Communication Digitale" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Communication Digitale') echo 'selected'; ?>>Communication digitale</option>
                            <option value="Génie Civil" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Génie Civil') echo 'selected'; ?>>Génie Civil</option>
                            <option value="Cybersécurité" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Cybersécurité') echo 'selected'; ?>>Cybersécurité</option>
                        </select>
                    </div>

                    <div>
                        <label class="label-select">Niveau</label>
                        <label><input type="radio" name="niveau" value="1ère année" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['niveau'] == '1ère année') echo 'checked'; ?>>1ère année</label>
                        <label><input type="radio" name="niveau" value="2ème année" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['niveau'] == '2ème année') echo 'checked'; ?>>2ème année</label>
                        <label><input type="radio" name="niveau" value="3ème année" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['niveau'] == '3ème année') echo 'checked'; ?>>3ème année</label>
                    </div>
                </div>

                <div class="div-select">
                    <div>
                        <label class="label-champ">Sexe</label>
                        <select class="sexe" name="sexe" required>
                            <option value="Masculin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe'] == 'Masculin') echo 'selected'; ?>>Masculin</option>
                            <option value="Féminin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe'] == 'Féminin') echo 'selected'; ?>>Féminin</option>
                        </select>
                    </div>

                    <div>
                        <label class="label-champ">Civilité</label>
                        <select class="civilite" name="civilite" required>
                            <option value="M." <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['civilite'] == 'M.') echo 'selected'; ?>>M.</option>
                            <option value="Mme." <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['civilite'] == 'Mme.') echo 'selected'; ?>>Mme.</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <div class="div-button">
                <?php if ($mode_modification): ?>
                    <input type="hidden" name="ligne" value="<?php echo $ligne_modification; ?>">
                    <button class="button" type="submit" name="action" value="enregistrer_modification">Enregistrer les modifications</button>

                <?php else: ?>
                    <button class="button" type="submit" name="action" value="enregistrer">Enregistrer</button>
                <?php endif; ?>
                <button class="button" type="reset">Réinitialiser</button>
            </div>
        </form>
    </div>

    <table>
        <tr>
            <td>#</td>
            <td>Nom et Prénom de l'étudiant</td>
            <td>Filière</td>
            <td>Niveau</td>
            <td>Sexe</td>
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
        foreach ($_SESSION['donnees'] as $key => $ligne) {
        ?>
            <tr>
                <td>
                    <?php echo $i; ?>
                </td>
                <td>
                    <?php echo $ligne["civilite"] . ' ' . $ligne["nom_etudiant"] . ' ' . $ligne["prenom_etudiant"]; ?>
                </td>
                <td>
                    <?php echo $ligne["filiere"]; ?>
                </td>
                <td>
                    <?php echo $ligne["niveau"]; ?>
                </td>
                <td>
                    <?php echo $ligne["sexe"]; ?>
                </td>
                <td>
                    <?php echo $ligne["nom_editeur"]; ?>
                </td>
                <td>
                    <?php echo $ligne["prenom_editeur"]; ?>
                </td>
                <td>
                    <?php echo $ligne["poste"]; ?>
                </td>
                <td>
                    <?php echo $ligne["entreprise"]; ?>
                </td>
                <td>
                    <?php echo $ligne["lieu_edition"]; ?>
                </td>
                <td>
                    <?php echo $ligne["date_edition"]; ?>
                </td>

                <td>
                    <div id="alpha">
                        <div>
                            <form action="traitement.php" method="POST">
                                <input type="hidden" name="ligne" value="<?php echo $key; ?>">
                                <button class="button" title="Modifier" type="submit" name="action" value="modifier"><i class="fa-solid fa-pen-clip"></i></button>
                            </form>
                        </div>
                        <div>
                            <form action="traitement.php" method="POST">
                                <input type="hidden" name="ligne" value="<?php echo $key; ?>">
                                <input type="hidden" value="<?php echo $ligne["prenom_etudiant"]; ?>">
                                <button title="Supprimer" class="button" type="submit" name="action" value="supprimer"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
                        <div>
                            <form action="fiche.php" method="POST">
                                <input type="hidden" name="nom_etudiant" value="<?php echo $ligne['nom_etudiant']; ?>">
                                <input type="hidden" name="prenom_etudiant" value="<?php echo $ligne['prenom_etudiant']; ?>">
                                <input type="hidden" name="filiere" value="<?php echo $ligne['filiere']; ?>">
                                <input type="hidden" name="niveau" value="<?php echo $ligne['niveau']; ?>">
                                <input type="hidden" name="sexe" value="<?php echo $ligne['sexe']; ?>">
                                <input type="hidden" name="sexe_signataire" value="<?php echo $ligne['sexe_signataire']; ?>">
                                <input type="hidden" name="civilite" value="<?php echo $ligne['civilite']; ?>">
                                <input type="hidden" name="nom_editeur" value="<?php echo $ligne['nom_editeur']; ?>">
                                <input type="hidden" name="prenom_editeur" value="<?php echo $ligne['prenom_editeur']; ?>">
                                <input type="hidden" name="poste" value="<?php echo $ligne['poste']; ?>">
                                <input type="hidden" name="entreprise" value="<?php echo $ligne['entreprise']; ?>">
                                <input type="hidden" name="lieu_edition" value="<?php echo $ligne['lieu_edition']; ?>">
                                <input type="hidden" name="date_edition" value="<?php echo $ligne['date_edition']; ?>">
                                <button title="Prévisualiser" class="button" type="submit"><i class="fa-solid fa-eye"></i></button>
                            </form>
                        </div>

                        <div>
                            <form action="fiche.php" method="POST">
                                <input type="hidden" name="nom_etudiant" value="<?php echo $ligne['nom_etudiant']; ?>">
                                <input type="hidden" name="prenom_etudiant" value="<?php echo $ligne['prenom_etudiant']; ?>">
                                <input type="hidden" name="filiere" value="<?php echo $ligne['filiere']; ?>">
                                <input type="hidden" name="niveau" value="<?php echo $ligne['niveau']; ?>">
                                <input type="hidden" name="sexe" value="<?php echo $ligne['sexe']; ?>">
                                <input type="hidden" name="sexe_signataire" value="<?php echo $ligne['sexe_signataire']; ?>">
                                <input type="hidden" name="civilite" value="<?php echo $ligne['civilite']; ?>">
                                <input type="hidden" name="nom_editeur" value="<?php echo $ligne['nom_editeur']; ?>">
                                <input type="hidden" name="prenom_editeur" value="<?php echo $ligne['prenom_editeur']; ?>">
                                <input type="hidden" name="poste" value="<?php echo $ligne['poste']; ?>">
                                <input type="hidden" name="entreprise" value="<?php echo $ligne['entreprise']; ?>">
                                <input type="hidden" name="lieu_edition" value="<?php echo $ligne['lieu_edition']; ?>">
                                <input type="hidden" name="date_edition" value="<?php echo $ligne['date_edition']; ?>">
                                <button title="Imprimer" class="button" type="submit" name="imprimer"><i class="fa-solid fa-print"></i></button>
                            </form>
                        </div>
                    </div>
                </td>

            </tr>
        <?php
            $i = $i + 1;
        }
        ?>
    </table>
</body>

</html>