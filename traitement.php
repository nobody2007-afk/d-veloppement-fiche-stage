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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attestations de stage — Pigier Bénin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark mb-4" style="background-color: #1d2941;">
        <div class="container">
            <span class="navbar-brand d-flex align-items-center gap-2">
                <img src="pigier-benin.png" alt="logo" width="100">
                Attestations de stage — Pigier Bénin
            </span>
        </div>
    </nav>

    <div class="container pb-5">

        <div class="card mb-4 shadow-sm div1">
            <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #1d2941;">
                <h2 class="h5 mb-0">Enregistrement</h2>
                <button class="btn btn-light btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#form1" aria-expanded="<?php echo $mode_modification ? 'true' : 'false'; ?>" aria-controls="form1">
                    <i class="fa-solid fa-plus"></i> Ajouter
                </button>
            </div>
            <div class="card-body">
                <div class="collapse<?php echo $mode_modification ? ' show' : ''; ?>" id="form1">
                    <form action="traitement.php" method="POST">

                        <fieldset class="border rounded p-3 mb-4">
                            <legend class="float-none w-auto px-2 h6">Informations générales</legend>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom du signataire</label>
                                    <input class="form-control" type="text" name="nom_editeur" required
                                        placeholder="Saisir le nom du signataire..."
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['nom_editeur'] : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prénom du signataire</label>
                                    <input class="form-control" type="text" name="prenom_editeur" required
                                        placeholder="Saisir le prénom..."
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['prenom_editeur'] : ''; ?>">
                                </div>
                            </div>

                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label">Poste du signataire</label>
                                    <input class="form-control" type="text" name="poste" required
                                        placeholder="Saisir le poste du signataire..."
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['poste'] : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Sexe du signataire</label>
                                    <select class="form-select" name="sexe_signataire" required>
                                        <option value="">Sélectionner le sexe</option>
                                        <option value="Masculin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe_signataire'] == 'Masculin') echo 'selected'; ?>>Masculin</option>
                                        <option value="Féminin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe_signataire'] == 'Féminin') echo 'selected'; ?>>Féminin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label">Lieu d'édition</label>
                                    <input class="form-control" type="text" name="lieu_edition" required
                                        placeholder="Saisir le lieu d'édition..."
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['lieu_edition'] : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date d'édition</label>
                                    <input class="form-control" type="date" name="date_edition" required
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['date_edition'] : ''; ?>">
                                </div>
                            </div>

                            <div class="row g-3 mt-1">
                                <div class="col-md-12">
                                    <label class="form-label">Structure d'accueil</label>
                                    <input class="form-control" type="text" name="entreprise" required
                                        placeholder="Saisir le nom de la structure..."
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['entreprise'] : ''; ?>">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border rounded p-3 mb-4">
                            <legend class="float-none w-auto px-2 h6">Informations académiques</legend>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom de l'étudiant</label>
                                    <input class="form-control" type="text" name="nom_etudiant" required
                                        placeholder="Saisir le nom de l'étudiant..."
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['nom_etudiant'] : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Prénoms de l'étudiant</label>
                                    <input class="form-control" type="text" name="prenom_etudiant" required
                                        placeholder="Saisir le prénom de l'étudiant..."
                                        value="<?php echo $mode_modification ? $_SESSION['donnees'][$ligne_modification]['prenom_etudiant'] : ''; ?>">
                                </div>
                            </div>

                            <div class="row g-3 mt-1 align-items-start">
                                <div class="col-md-6">
                                    <label class="form-label">Filière</label>
                                    <select class="form-select" name="filiere" required>
                                        <option value="Développement Web" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Développement Web') echo 'selected'; ?>>Développement web</option>
                                        <option value="Création Digitale" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Création Digitale') echo 'selected'; ?>>Création digitale</option>
                                        <option value="Communication Digitale" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Communication Digitale') echo 'selected'; ?>>Communication digitale</option>
                                        <option value="Génie Civil" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Génie Civil') echo 'selected'; ?>>Génie Civil</option>
                                        <option value="Cybersécurité" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['filiere'] == 'Cybersécurité') echo 'selected'; ?>>Cybersécurité</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label d-block">Niveau</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="niveau" id="niveau1" value="1ère année" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['niveau'] == '1ère année') echo 'checked'; ?>>
                                        <label class="form-check-label" for="niveau1">1ère année</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="niveau" id="niveau2" value="2ème année" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['niveau'] == '2ème année') echo 'checked'; ?>>
                                        <label class="form-check-label" for="niveau2">2ème année</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="niveau" id="niveau3" value="3ème année" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['niveau'] == '3ème année') echo 'checked'; ?>>
                                        <label class="form-check-label" for="niveau3">3ème année</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label">Sexe</label>
                                    <select class="form-select" name="sexe" required>
                                        <option value="Masculin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe'] == 'Masculin') echo 'selected'; ?>>Masculin</option>
                                        <option value="Féminin" <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['sexe'] == 'Féminin') echo 'selected'; ?>>Féminin</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Civilité</label>
                                    <select class="form-select" name="civilite" required>
                                        <option value="M." <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['civilite'] == 'M.') echo 'selected'; ?>>M.</option>
                                        <option value="Mme." <?php if ($mode_modification && $_SESSION['donnees'][$ligne_modification]['civilite'] == 'Mme.') echo 'selected'; ?>>Mme.</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>

                        <div class="d-flex gap-2">
                            <?php if ($mode_modification): ?>
                                <input type="hidden" name="ligne" value="<?php echo $ligne_modification; ?>">
                                <button class="btn btn-primary" type="submit" name="action" value="enregistrer_modification">Enregistrer les modifications</button>
                            <?php else: ?>
                                <button class="btn btn-primary" type="submit" name="action" value="enregistrer">Enregistrer</button>
                            <?php endif; ?>
                            <button class="btn btn-outline-secondary" type="reset">Réinitialiser</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #1d2941;">
                <h2 class="h5 mb-0">Fiches enregistrées</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Étudiant</th>
                                <th>Filière</th>
                                <th>Niveau</th>
                                <th>Signataire</th>
                                <th>Structure</th>
                                <th>Édition</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($_SESSION['donnees'] as $key => $ligne) {
                            ?>
                                <tr>
                                    <td class="text-muted"><?php echo $i; ?></td>
                                    <td>
                                        <div class="fw-semibold"><?php echo $ligne["civilite"] . ' ' . $ligne["nom_etudiant"] . ' ' . $ligne["prenom_etudiant"]; ?></div>
                                        <div class="text-muted small"><?php echo $ligne["sexe"]; ?></div>
                                    </td>
                                    <td><span class="badge bg-primary text-white"><?php echo $ligne["filiere"]; ?></span></td>
                                    <td><span class="badge bg-secondary text-white"><?php echo $ligne["niveau"]; ?></span></td>
                                    <td>
                                        <div><?php echo $ligne["nom_editeur"] . ' ' . $ligne["prenom_editeur"]; ?></div>
                                        <div class="text-muted small"><?php echo $ligne["poste"]; ?></div>
                                    </td>
                                    <td><?php echo $ligne["entreprise"]; ?></td>
                                    <td>
                                        <?php echo $ligne["lieu_edition"]; ?>
                                        <div class="text-muted small"><?php echo date("d/m/Y", strtotime($ligne["date_edition"])); ?></div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1 justify-content-end">
                                            <form action="traitement.php" method="POST">
                                                <input type="hidden" name="ligne" value="<?php echo $key; ?>">
                                                <button class="btn btn-sm btn-outline-warning" title="Modifier" type="submit" name="action" value="modifier"><i class="fa-solid fa-pen-clip"></i></button>
                                            </form>

                                            <form action="traitement.php" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette ligne ?');">
                                                <input type="hidden" name="ligne" value="<?php echo $key; ?>">
                                                <button title="Supprimer" class="btn btn-sm btn-outline-danger" type="submit" name="action" value="supprimer"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>

                                            <form action="fiche.php" method="POST">
                                                <?php foreach ($ligne as $champ => $valeur): ?>
                                                    <input type="hidden" name="<?php echo $champ; ?>" value="<?php echo $valeur; ?>">
                                                <?php endforeach; ?>
                                                <button title="Prévisualiser" class="btn btn-sm btn-outline-info" type="submit"><i class="fa-solid fa-eye"></i></button>
                                            </form>

                                            <form action="fiche.php" method="POST" onsubmit="return imprimerFiche(this, event);">
                                                <?php foreach ($ligne as $champ => $valeur): ?>
                                                    <input type="hidden" name="<?php echo $champ; ?>" value="<?php echo $valeur; ?>">
                                                <?php endforeach; ?>
                                                <button title="Imprimer" class="btn btn-sm btn-outline-secondary" type="submit" name="imprimer"><i class="fa-solid fa-print"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $i = $i + 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/eb6368b0a2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
        function imprimerFiche(form, e) {
            e.preventDefault();

            var donnees = new FormData(form);
            donnees.append('imprimer', '1');

            fetch(form.action, {
                method: 'POST',
                body: donnees
            })
            .then(function (reponse) {
                return reponse.text();
            })
            .then(function (html) {
                var iframe = document.getElementById('iframeImpression');
                if (iframe) {
                    iframe.remove();
                }
                iframe = document.createElement('iframe');
                iframe.id = 'iframeImpression';
                iframe.style.position = 'fixed';
                iframe.style.top = '-10000px';
                iframe.style.left = '-10000px';
                iframe.style.width = '900px';
                iframe.style.height = '1300px';
                iframe.style.border = '0';
                document.body.appendChild(iframe);

                var dossier = window.location.href.substring(0, window.location.href.lastIndexOf('/') + 1);
                html = html.replace('<head>', '<head><base href="' + dossier + '">');

                var doc = iframe.contentWindow.document;
                doc.open();
                doc.write(html);
                doc.close();
            })
            .catch(function (erreur) {
                console.error('Erreur téléchargement PDF :', erreur);
            });

            return false;
        }
    </script>

    <?php if ($mode_modification): ?>
    <script>
        document.getElementById('form1').scrollIntoView({ behavior: 'smooth', block: 'start' });
    </script>
    <?php endif; ?>

</body>

</html>