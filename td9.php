<?php 
$title = "TD9"; 
include('includes/header.inc.php'); 
require_once("includes/fonctions.inc.php");

?>

    <main>
        <section>
            <h2> Les Exercicess </h2>
            <article>
                <h3>  Exercice 1 et 2 </h3>
                <!-- Formulaire HTML -->
                <form method="get" action="td9bis.php">
                    <p>
                        <label for="chaine">Saisir une chaîne en minuscules:</label>
                        <input type="text" id="chaine" name="chaine" required>
                    </p>
                    <p>
                        <label for="chaine">Saisir une valeur decimal </label>
                        <input type="number" id="decimal" name="decimal" required>
                   
                    <button type="submit">Valider</button>
                    </p>
                </form>
            </article>
            <article>
                <h3> Exercice 3 Moteur de recherche </h3> 
                <form method="get" action="resultat.php" target="_blank">
    <input type="radio" id="google" name="engine" value="https://www.google.com/search">
    <label for="google">Google</label>

    <input type="radio" id="bing" name="engine" value="https://www.bing.com/search">
    <label for="bing">Bing</label>

    <input type="radio" id="yahoo" name="engine" value="https://fr.search.yahoo.com/search">
    <label for="yahoo">Yahoo</label>

    <br>

    <label for="query">Rechercher :</label>
    <input type="text" id="query" name="q" required>
    <button type="submit">Rechercher</button>
</form>



            </article>

            <article>
                <h3>  formulaire de saisie d'URL </h3>
                <form method="get" action="td9bis.php">
                    <label for="url">Saisir une URL :</label>
                    <input type="text" name="url" id="url">
                    <button type="submit">Valider</button>
                </form>
              
                </article>
            <article>
                <h3> Formulaire avec liste d'option </h3>
                    <form method="post">
		                <select name="nombre">
			            <?php
			            // Générer la liste d'options
			            for ($i = 2; $i <= 16; $i++) {
				        echo "<option value=\"$i\">$i</option>";
		        	    }
			            ?>
		                </select>
		                <input type="submit" value="Afficher la table de multiplication">
	                </form>
                    <?php
	                // Afficher la table de multiplication correspondante
	                if (isset($_POST['nombre'])) {
		                $nombre = $_POST['nombre'];
                        require_once("includes/fonctions.inc.php"); 
                        echo afficheTableMultiplication($nombre);}
	                ?>
            </article>

            <article>
                <h3> Exercice 6 : Formulaire avec case a cocher</h3>
            <form method="get" action="td9bis.php">
                <table>
                    <tr>
                        <td></td>
                        <td>r</td>
                        <td>w</td>
                        <td>x</td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td><input type="checkbox" name="user_r" value="4"></td>
                        <td><input type="checkbox" name="user_w" value="2"></td>
                        <td><input type="checkbox" name="user_x" value="1"></td>
                    </tr>
                    <tr>
                        <td>Group</td>
                        <td><input type="checkbox" name="group_r" value="4"></td>
                        <td><input type="checkbox" name="group_w" value="2"></td>
                        <td><input type="checkbox" name="group_x" value="1"></td>
                    </tr>
                    <tr>
                        <td>Others</td>
				        <td><input type="checkbox" name="others_r" value="4"></td>
				        <td><input type="checkbox" name="others_w" value="2"></td>
				        <td><input type="checkbox" name="others_x" value="1"></td>
			        </tr>
		    </table>
		    <input type="submit" value="Valider">
	    </form>
        </article>

        <article>
            <h3> Exercice 7</h3>
                <form action="td9bis.php" method="get">
                    <label for="jour">Jour :</label>
                    <select name="jour" id="jour">
                        <?php
                        // Appel à la fonction pour générer les options de la liste déroulante pour le jour
                       echo  genererListeJour();
                        ?>

                    </select>
    
                    <label for="mois">Mois :</label>
                    <select name="mois" id="mois">
                        <?php
                        // Appel à la fonction pour générer les options de la liste déroulante pour le mois
                       echo  genererListeMois();
                        ?>
                    </select>
    
                    <label for="annee">Année :</label>
                    <select name="annee" id="annee">
                        <?php
                        // Appel à la fonction pour générer les options de la liste déroulante pour l'année
                       echo  genererListeAnnee();
                        ?>
                </select>
             <input type="submit" value="Envoyer">
        </form>
        </article>

        <article>
            <h3> Exercice 8 </h3>
            <form action="td9bis.php" method="get">
        <label for="valeur_octale">Valeur octale :</label>
        <input type="text" name="valeur_octale" id="valeur_octale">
  
  <div>
    <label for="type_fichier">Fichier :</label>
    <input type="radio" name="type_element" value="fichier" id="type_fichier">
  </div>
  
  <div>
    <label for="type_repertoire">Répertoire :</label>
    <input type="radio" name="type_element" value="répertoire" id="type_repertoire">
  </div>
  
  <input type="submit" value="Envoyer">
</form>

        </article>
    </section>

</main>
<?php 
include('includes/footer.inc.php');
?>