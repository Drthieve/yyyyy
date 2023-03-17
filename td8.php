<?php 
$title="TD8";
include('includes/header.inc.php');
?>
<main>
<section>
    <h2> Les exercices </h2>
    <article>
        <h3 id="exercice1"> Exercice 1 </h3>
        <form method="post">
            <label for="url">Saisir une URL :</label>
            <input type="text" name="url" id="url">
            <button type="submit">Valider</button>
        </form>

    <?php
        require_once('includes/fonctions.inc.php'); // inclusion du fichier contenant les fonctions
        // Vérification si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération de la valeur du champ de texte
            $url = $_POST["url"];
            try {
                // Appel de la fonction parseUrl avec l'URL saisie
                $result = parseUrl($url);
                // Affichage du tableau associatif retourné
                echo "<table>";
                foreach ($result as $key => $value) {
                    echo "<tr>";
                    echo "<td>$key</td><td>$value</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    ?>
    </article>
    <article>
        <h3 id="exercice2"> Exercice 2 :</h3>
        <p>On considère la valeur octale de la commande Unix « chmod». </p>
        <?php
            require_once('includes/fonctions.inc.php'); // inclusion du fichier contenant les fonctions
            echo '<p>   400 :' .    getPermissions(400). "</p>" ;  // affiche "r-- --- ---"
            echo '<p>   640 :' .    getPermissions(640) . "</p>" ;  // affiche "rw- r-- ---"
            echo '<p>   755 :' .    getPermissions(755). "</p>" ; // affiche "rwx r-x r-x"
      
        ?>
    </article>
   
    <article>
    <h3 id="exercice">Mode Sombre / Mode Claire</h3>



            <p id="lien0"><a href="td8.php?style=clair">Mode jour</a>   
            <p id="lien4"><a href="td8.php?style=sombre">Mode nuit</a>
            <?php
         if (isset($_GET['style'])) {
        $style = $_GET['style'];
        if ($style == 'clair') {
        echo '<link rel="stylesheet" href="style.css">';
    } elseif ($style == 'sombre') {
        echo '<link rel="stylesheet" href="style_alternatif.css">';
    }
}

?>
         </article>
        <article>
        
        <h3 id="exercice3"> fonction/argument/paramètre</h3>
      
            <?php
                require_once('includes/fonctions.inc.php'); // inclusion du fichier contenant les fonctions

            if (isset($_GET['size'])) {
                $size = (int)$_GET['size'];
                echo afficheTableMultiplication($size);
            } else {
               echo  afficheTableMultiplication();
            }
            
            ?>

            <p id="lien1"><a href="td8.php?size=8">Table de 8</a></p>
            <p id ="lien2"><a href="td8.php?">Table par défaut</a></p>
            <p id ="lien3"><a href="td8.php?size=4">Table de 4</a></p>
    </article>
         
        </section>
        </main>
        
<?php include "includes/footer.inc.php";
?>