<?php 
$title = "TD9"; 
include('includes/header.inc.php'); 
require_once("includes/fonctions.inc.php");
?>
<main>
    
    <section>
    <h2> Les Exercices</h2>
        <article>
            <h3> chaine en Majuscles </h3>
            <?php
            // Récupération de la chaîne saisie par l'utilisateur
            $chaine = $_GET['chaine'];
            
            // Conversion de la chaîne en majuscules
            $chaine_maj = strtoupper($chaine);
            
            // Affichage du résultat
            echo '<p> La chaîne en majuscules est : '.$chaine_maj.'</p>';
            ?>
        </article>
        <article>
            <h3> valeur en hexadecimal </h3>
            <?php   
            // Récupération de la valeur décimale saisie par l'utilisateur
            $decimal = $_GET['decimal'];

            // Conversion de la valeur décimale en hexadécimal
            $hexadecimal = dechex($decimal);

            // Affichage du résultat
            echo '<p> La valeur décimale '.$decimal.' en hexadécimal est : '.$hexadecimal.'</p>';
            ?>    
        </article>
        <article>
            <h3> formulaire de parse URL </h3>
            <?php
        require_once('includes/fonctions.inc.php'); // inclusion du fichier contenant les fonctions

        // Vérification si le formulaire a été soumis      
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Récupération de la valeur du champ de texte
            $url = $_GET["url"];
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
            <h3> Formulaire avec cases a cocher </h3>
                        <?php  // Vérifier si des cases ont été cochées
                if (!empty($_GET)) {
	                // Calculer la valeur octale à partir des cases cochées
	                $user = 0;
	                $group = 0;
	                $others = 0;

	                if (isset($_GET['user_r'])) {
		                $user += intval($_GET['user_r']);
	                }
	                if (isset($_GET['user_w'])) {
		            $user += intval($_GET['user_w']);
	                }
	                if (isset($_GET['user_x'])) {
		                $user += intval($_GET['user_x']);
	                }

	                if (isset($_GET['group_r'])) {
		                $group += intval($_GET['group_r']);
	                }
	                if (isset($_GET['group_w'])) {
		                $group += intval($_GET['group_w']);
	                }
	                if (isset($_GET['group_x'])) {
		                $group += intval($_GET['group_x']);
	            }

	            if (isset($_GET['others_r'])) {
		        $others += intval($_GET['others_r']);
	            }
	            if (isset($_GET['others_w'])) {
		            $others += intval($_GET['others_w']);
	            }
	            if (isset($_GET['others_x'])) {
		            $others += intval($_GET['others_x']);
	            }

	            // Calculer la valeur octale totale
	            $octal = ($user * 100) + ($group * 10) + $others;

	            // Afficher la valeur octale
                 
	            echo '<p>Valeur octale pour la commande chmod : '.$octal.'</p>';

            } else {
	            // Si aucune case n'a été cochée, afficher un message d'erreur
	            echo '<p>Erreur : Aucune case n a été cochée.</p>';
}
?>
        </article>

        <article>
            <h3> formulaire généré par des boucles PHP avec liste d'options </h3>
            <?php
                $jour = $_GET['jour'];
                $mois = $_GET['mois'];
                $annee = $_GET['annee'];
                checkDateEtAfficheResultat($jour, $mois, $annee);
            ?>
         </article>

         <article> 
            <h3> formulaire avec boutton radio exercice 8 </h3>
            <?php 
            require_once("includes/fonctions.inc.php");
            $valeur_octale = $_GET['valeur_octale'];
            $type_element = $_GET['type_element'];
            $permission = getPermission($valeur_octale, $type_element);
            header("Location: resultat.php?permission=" . urlencode($permission));
            ?>
            </article>
        </section>
    </main>
<?php
include('includes/footer.inc.php');
?>
