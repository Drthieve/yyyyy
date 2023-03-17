<?php 

   // Définir les constantes
   define('DEFAULT_TABLE_SIZE', 10);
   define('MAX_TABLE_SIZE', 100);
    
   // Tableau associatif pour les jours de la semaine
   define('JOURS_SEMAINE', array(
    'monday' => 'Lune',
    'tuesday' => 'Mars',
    'wednesday' => 'Mercure',
    'thursday' => 'Jupiter',
    'friday' => 'Vénus',
    'saturday' => 'Saturne',
    'sunday' => 'Soleil'
));

    // Tableau associatif pour les mois de l'année
    define('MOIS_ANNEE', array(
    'january' => 'mois de Janus',
    'february' => 'mois des purifications',
    'march' => 'mois de Mars',
    'april' => 'mois d\'Aphrodite',
    'may' => 'mois de Maia',
    'june' => 'mois de Junon',
    'july' => 'mois de Jules César',
    'august' => 'mois d\'Auguste',
    'september' => 'mois de Septembre',
    'october' => 'mois d\'Octave',
    'november' => 'mois des morts',
    'december' => 'mois de la déesse romaine Ops'
));
   /**
    * Cette fonction retourne une table de multiplication
    * sous la forme d'un tableau HTML.
    * La dimension de la table est passée en paramètre.
    * Par défaut, la table de multiplication affichée est 10 x 10.
    *
    * @param int $size La dimension de la table de multiplication
    * @return string un tableau en html Le code HTML de la table de multiplication
    */
   function afficheTableMultiplication($size = DEFAULT_TABLE_SIZE) : string
   {
       // Vérifier que la taille est valide
       if ($size <= 0 || $size > MAX_TABLE_SIZE) {
           return '<p>La taille de la table doit être comprise entre 1 et ' . MAX_TABLE_SIZE . '.</p>';
       }

       // Construire la table
       $resultat = '<table>';
       $resultat .= '<caption>Table de multiplication</caption>';
       $resultat .= '<thead>';
       $resultat .= '<tr><th>X</th>';
       for ($i = 1; $i <= $size; $i++) {
           $resultat .= '<th>' . $i . '</th>';
       }
       $resultat .= '</tr></thead><tbody>';
       for ($i = 1; $i <= $size; $i++) {
           $resultat .= '<tr><th>' . $i . '</th>';
           for ($j = 1; $j <= $size; $j++) {
               $resultat .= '<td>' . ($i * $j) . '</td>';
           }
           $resultat .= '</tr>';
       }
       $resultat .= '</tbody></table>';
       return $resultat;
   }

  
    /**
    * Cette fonction affiche la table ASCII standard avec une mise en forme CSS.
    *
    * La table contient les 128 premiers caractères de la table ASCII (de 0 à 127), à l'exception des 32 premiers (de 0 à 31).
    * Les chiffres, les majuscules et les minuscules sont mis en forme avec des couleurs différentes en utilisant des classes CSS internes.
     * Les autres caractères sont sur fond par défaut.
    * Les caractères qui sont également des entités HTML sont traités pour que la page soit valide.
    * Le dernier caractère de la table est remplacé par &#x00A0; pour que la page soit valide HTML et bien formée XML.
    *
    * @return string Un tableau HTML contenant la table ASCII et une mise en forme CSS.
    */
    function afficheTableAscii() :string {
        $resultat = '<table>';
        $resultat .= '<caption>Tableau de code ASCII</caption>';
        $resultat .= '<thead>';
        $resultat .= '<tr><th></th>';
        for ($i = 0; $i <= 15; $i++) {
         if ($i > 9) 
            {
                  $resultat .= '<th class="majuscule">' . chr($i + 55) . '</th>';
            }
         else
            {
                 $resultat .= '<th class="chiffre">' . $i . '</th>';
            }
          }
        $resultat .= '</tr></thead>';
        $resultat .= '<tbody>';
        $compteurAscii = 32;
        for ($i = 2; $i <= 7; $i++) {
            $resultat .= '<tr>';
            $resultat .= '<th class="minuscule">' . $i . '</th>';
          for ($x = 1; $x <= 16; $x++) {
            if ($i == 7 && $x == 16) {
              $resultat .= '<td>&#x00A0;</td>';
            } else 
            {
                $char = chr($compteurAscii);
                switch ($char) 
                {
                    case '<':
                        $resultat .= '<td>&lt;</td>';
                        break;
                    case '>':
                        $resultat .= '<td>&gt;</td>';
                        break;
                    case '&':
                        $resultat .= '<td>&amp;</td>';
                       break;
                    case "\n":
                        $resultat .= '<td class="autre">\\n</td>';
                        break;
                    case "\t":
                        $resultat .= '<td class="autre">\\t</td>';
                        break;
                    default:
                        if (ctype_upper($char)) {
                            $resultat .= '<td class="majuscule">' . $char . '</td>';
                        } elseif (ctype_lower($char)) {
                            $resultat .= '<td class="minuscule">' . $char . '</td>';
                        } else {
                            $resultat .= '<td class="autre">' . $char . '</td>';
                        }
                }
              $compteurAscii++;
            }
          }
          $resultat .= '</tr>';
        }
        $resultat .= '</tbody></table>';
        return $resultat;
    }
      /*
                        *Cette fonction affiche une liste des régions françaises.
                        *L'argument "type" peut être utilisé pour spécifier le type de liste (ul ou ol).
      */
    function afficher_regions($type = "ul") {
        $tabregions = array(
            "Auvergne-Rhône-Alpes",
            "Bourgogne-Franche-Comté",
            "Bretagne",
            "Centre-Val de Loire",
            "Corse",
            "Grand Est",
            "Hauts-de-France",
            "Île-de-France",
            "Normandie",
            "Nouvelle-Aquitaine",
            "Occitanie",
            "Pays de la Loire",
            "Provence-Alpes-Côte d'Azur"
        );

        $html = "<" . $type . ">";
        foreach ($tabregions as $region) {
            $html .= "<li>" . $region . "</li>";
        }
        $html .= "</" . $type . ">";

        return $html;
    }


   
 /**
 * Retourne les origines étymologiques du jour de la semaine et du mois de l'année pour la date courante.
 *
 * @param array|null $joursSemaine Le tableau associatif des jours de la semaine avec leur origine étymologique. Utilise la constante JOURS_SEMAINE par défaut si aucune valeur n'est fournie.
 * @param array|null $moisAnnee Le tableau associatif des mois de l'année avec leur origine étymologique. Utilise la constante MOIS_ANNEE par défaut si aucune valeur n'est fournie.
 *
 * @return array Un tableau contenant les origines étymologiques du jour de la semaine et du mois de l'année.
 */
function origineEtymologiqueDateCourante($joursSemaine = JOURS_SEMAINE, $moisAnnee = MOIS_ANNEE)
{
    $jourSemaine = strtolower(date('l'));
    $moisAnnee = strtolower(date('F'));

    $origineJourSemaine = isset($joursSemaine[$jourSemaine]) ? $joursSemaine[$jourSemaine] : 'inconnue';
    $origineMoisAnnee = isset($moisAnnee[$moisAnnee]) ? $moisAnnee[$moisAnnee] : 'inconnue';

    return array($origineJourSemaine, $origineMoisAnnee);
}
function safeWebPalette() {
    $redValues = array(0, 51, 102, 153, 204, 255);
    $greenValues = array(0, 51, 102, 153, 204, 255);
    $blueValues = array(0, 51, 102, 153, 204, 255);
    $couleur = array();
    foreach ($redValues as $red) {
        foreach ($greenValues as $green) {
            foreach ($blueValues as $blue) {
                $couleur[] = sprintf('#%02x%02x%02x', $red, $green, $blue);
            }
        }
    }
    return $couleur;
}

/* 
                        *Cette fonction prend une URL en entrée et la décompose en différentes parties telles que le protocole, le sous-domaine,
                        *le domaine et le TLD (Top Level Domain). Elle utilise des fonctions PHP comme "explode()" pour séparer les parties
                        *de l'URL en utilisant des délimiteurs spécifiques. 
                        */
                        function parseUrl($url) {
                            // Récupération du protocole
                            $protocol = explode('://', $url)[0];
                        
                            // Récupération de l'organisme et du nom de la machine
                            $host = explode('://', $url)[1];
                            $host_parts = explode('.', $host);
                            $subdomain = '';
                            $domain = '';
                            $tld = '';
                            if (count($host_parts) > 2) {
                                // Le sous-domaine existe
                                $subdomain = $host_parts[0];
                                $domain = $host_parts[1];
                                $tld = $host_parts[2];
                            } else {
                                $domain = $host_parts[0];
                                $tld = $host_parts[1];
                            }
                        
                            // Tableau associatif résultant
                            $result = array(
                                "protocol" => $protocol,
                                "host" => $subdomain != '' ? "$subdomain.$domain" : $domain,
                                "domain" => $domain,
                                "tld" => $tld
                            );
                        
                            // Vérification que le TLD est valide
                            $valid_tlds = array("com", "org", "net", "fr");
                            if (!in_array($result["tld"], $valid_tlds)) {
                                throw new Exception("Invalid TLD");
                            }
                        
                            return $result;
                        }

                       /**
                        * Renvoie une chaîne de caractères représentant les permissions en lecture, écriture et exécution pour le propriétaire,
                        * le groupe et les autres utilisateurs à partir d'une valeur octale sur 3 chiffres.
                        *
                        * @param octal la valeur octale sur 3 chiffres représentant les permissions
                        * @return une chaîne de caractères représentant les permissions en lecture, écriture et exécution pour le propriétaire,
                        * le groupe et les autres utilisateurs sous la forme d'un triplet "rwx".
                        */
                        function getPermissions($octal) {
                            $permissions = array(
                                '---', '--x', '-w-', '-wx', 'r--', 'r-x', 'rw-', 'rwx'
                            );
                            $owner = $permissions[intval($octal / 100) % 10];
                            $group = $permissions[intval($octal / 10) % 10];
                            $others = $permissions[intval($octal) % 10];
                            return $owner.' '. $group.' '. $others;
                        }

                        /**
                         * Génère un calendrier de l'année passée en paramètre.
                         *
                         * @param int $rows Le nombre de rangées de mois à afficher.
                         * @param int $cols Le nombre de colonnes de mois à afficher.
                         * @param int|null $year L'année à afficher. Si null, utilise l'année en cours.
                         *
                         * @return array Un tableau représentant l'année sous forme de calendrier.
                         */
                        function generateYearCalendar($year = null, $rows = 4, $cols = 3) {
                            // Si l'année n'est pas spécifiée, utilise l'année en cours
                            if ($year === null) {
                                $year = date('Y');
                            }
                            
                            // Détermine le mois courant
                            $currentMonth = date('n');
                            
                            // Calcule le nombre total de mois à afficher
                            $numMonths = $rows * $cols;

                            // Calcule le mois à afficher au centre (pour les années partielles)
                            $centerMonth = ($currentMonth <= 3) ? 3 : (($currentMonth <= 6) ? 6 : (($currentMonth <= 9) ? 9 : 12));

                            // Calcule le mois de début et le mois de fin à afficher
                            if ($numMonths < 12) {
                                // Année partielle
                                $startMonth = $centerMonth - floor($numMonths / 2);
                                $endMonth = $centerMonth + ceil($numMonths / 2) - 1;
                                if ($startMonth < 1) {
                                    $endMonth += abs($startMonth) + 1;
                                    $startMonth = 1;
                                }
                                if ($endMonth > 12) {
                                    $startMonth -= ($endMonth - 12);
                                    $endMonth = 12;
                                }
                                } else {
                                    // Année complète
                                    $startMonth = 1;
                                    $endMonth = 12;
                                }
                                    
                                // Génère un tableau de mois sous forme de tableau HTML
                                $calendar = [];
                                $month = $startMonth;
                                $calendarRow = [];
                                for ($row = 0; $row < $rows; $row++) {
                                    for ($col = 0; $col < $cols; $col++) {
                                        $calendarRow[] = generateMonthTable($month, $year);
                                        $month++;
                                        if ($month > $endMonth) {
                                            break;
                                        }
                                    }
                                    $calendar[] = $calendarRow;
                                    if ($month > $endMonth) {
                                        break;
                                    }
                                }
                                
                                return $calendar;
                            }
                            // Fonction pour générer la liste déroulante des jours
                            function genererListeJour()  {
                                $options = '';
                                for ($i = 1; $i <= 31; $i++) {
                                    $options .= '<option value="' . $i . '">' . $i . '</option>';
                                }
                                return $options;
                            }

                            // Fonction pour générer la liste déroulante des mois
                            function genererListeMois()  {
                                $options = '';
                                for ($i = 1; $i <= 12; $i++) {
                                    $options .= '<option value="' . $i . '">' . $i . '</option>';
                                }
                                return $options;
                            }
                            
                            // Fonction pour générer la liste déroulante des années
                            function genererListeAnnee() {
                                $options = '';
                                for ($i = 2010; $i <= 2030; $i++) {
                                    $options .= '<option value="' . $i . '">' . $i . '</option>';
                                }
                                return $options;
                            }
                            /**
                            * Vérifie si une date est valide et affiche le jour de la semaine correspondant ainsi que la date au format américain.
                            *
                            * @param int $jour Le numéro du jour dans le mois (entre 1 et 31).
                            * @param int $mois Le numéro du mois (entre 1 et 12).
                            * @param int $annee L'année (entre 2010 et 2030).
                            * @return string message pour dire si la date et valide ou pas
                            */
                            function checkDateEtAfficheResultat($jour, $mois, $annee)  : string {
                            if (checkdate($mois, $jour, $annee)) {
                                // la date est valide, on peut afficher le jour de la semaine correspondant et la date au format américain
                                $date = new DateTime("$annee-$mois-$jour");
                                $jour_semaine = $date->format('l');
                                $date_us = $date->format('Y-m-d');
                                echo '<p> Le '.$jour.'/'.$mois.'/'.$annee.' correspond au '. $jour_semaine .' '. ($date_us) .'</p>';
                            } 
                                else {
                                    // la date est invalide
                                    echo "La date saisie est invalide";
                                }
                                }
                                
                                
                                /**
                                Cette fonction permet de calculer les permissions d'un élément (fichier ou dossier) en fonction de son type et de sa valeur octale de permissions.
                                
                                @return string La chaîne de caractères correspondant aux permissions calculées.
                                 */
                                function getPermission() {
                                    // Récupération des valeurs des paramètres via la méthode GET
                                    $chmod = $_GET['chmod'];
                                    $type = $_GET['type'];
                                
                                    // Conversion de la valeur octale en binaire
                                    $binaire = sprintf("%03d", decbin(intval($chmod, 8)));
                                
                                    // Calcul des permissions en fonction du type d'élément
                                    $permission = '';
                                    if ($type === 'file') {
                                        $permission .= ($binaire[0] === '1') ? 'r' : '-';
                                        $permission .= ($binaire[1] === '1') ? 'w' : '-';
                                        $permission .= ($binaire[2] === '1') ? (($binaire[5] === '1') ? 's' : 'x') : (($binaire[5] === '1') ? 'S' : '-');
                                    } else {
                                        $permission .= 'd';
                                        $permission .= ($binaire[0] === '1') ? 'r' : '-';
                                        $permission .= ($binaire[1] === '1') ? 'w' : '-';
                                        $permission .= ($binaire[2] === '1') ? (($binaire[5] === '1') ? 's' : 'x') : (($binaire[5] === '1') ? 'S' : '-');
                                    }
                                
                                    // Retourne la chaîne de caractères correspondant au résultat
                                    return $permission;
                                }
        

?>