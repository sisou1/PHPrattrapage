<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "utilisateur";
$motdepasse = "motdepasse";
$basededonnees = "ma_base_de_donnees";

$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    // Insertion des données dans la base de données
    $requete = "INSERT INTO ma_table (nom, description) VALUES ('$nom', '$description')";
    if (mysqli_query($connexion, $requete)) {
        echo "L'élément a été ajouté avec succès.";
    } else {
        echo "Erreur : " . $requete . "<br>" . mysqli_error($connexion);
    }
}

// Fermer la connexion à la base de données
mysqli_close($connexion);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Herbier</title>
    <style>

        table
        {
            border-spacing : 0;
            border-collapse : collapse;
        }
        table td{
            border-width: 0;
            padding:0;
        }
        .bordure td{
            border:1px solid black;
            padding:3px;
            box-sizing: border-box;
        }
        .petitTableau td {
            width:13px;
            height:13px;
        }
        .petitTableau td.vert{
            background-color: green;
        }

    </style>
    <link rel="stylesheet" href="href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"">
</head>
<body>
<div class="container">
    <h1>relevés</h1>
    <table class="table table-striped   ">
        <tbody>
        <?php
        // methode qui tourne sur tout les element de la base de donnée
        echo '<a href="page_modifier.php"><button>Modifier</button></a>';
        echo '<a href="page_suprimer.php"><button>Suprimer</button></a>';
        ?>
        </tbody>
    </table>
</div>


<h1>Ajouter un élément à la base de données</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="date">Date :</label>
    <input type="date" date="date"><br><br>
    <label for="lieu">lieu :</label>
    <input type="text" lieu="lieu"><br><br>
    <label for="releve">relevé brut :</label>
    <input type="text" releve="releve"><br><br>
    <input type="submit" name="submit" value="OK">
</form>
</body>
</html>
