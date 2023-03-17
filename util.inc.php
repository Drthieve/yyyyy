<?php 
// Déclaration des variables globales pour le mois et l'année par défaut
$default_month = date('n');
$default_year = date('Y');

// fonction pour retourner la date en français ou en anglais
function getDateFormatted($lang = null) {
    $dayOfWeek = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    $monthOfYear = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $dayOfWeekFr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
    $monthOfYearFr = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
    
    if($lang == 'en') {
        return date("l, F j, Y");
    } elseif($lang == 'fr') {
        $date = $dayOfWeekFr[date('w')].' '.date('j').' '.$monthOfYearFr[date('n')-1].' '.date('Y');
        return $date;
    } else {
        $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if($browserLang == 'fr') {
            $date = $dayOfWeekFr[date('w')].' '.date('j').' '.$monthOfYearFr[date('n')-1].' '.date('Y');
            return $date;
        } else {
            return date("l, F j, Y");
        }
    }
}
function get_navigateur() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($user_agent, 'Firefox') !== false) {
        return 'Mozilla Firefox';
    } elseif (strpos($user_agent, 'Chrome') !== false) {
        return 'Google Chrome';
    } elseif (strpos($user_agent, 'Safari') !== false) {
        return 'Apple Safari';
    } elseif (strpos($user_agent, 'Edge') !== false) {
        return 'Microsoft Edge';
    } elseif (strpos($user_agent, 'MSIE') !== false || strpos($user_agent, 'Trident/') !== false) {
        return 'Internet Explorer';
    } else {
        return 'Inconnu';
    }
}
function afficher_calendrier($mois, $annee = null) {
    // Si $mois et $annee ne sont pas passés en paramètre, on utilise le mois et l'année courante
    if (!$mois || !$annee) {
        $mois = date('n');
        $annee = date('Y');
    }

    // Calcul du timestamp du premier jour du mois
    $timestamp_premier_jour = mktime(0, 0, 0, $mois, 1, $annee);
    
    // Calcul du nombre de jours dans le mois
    $nb_jours = date('t', $timestamp_premier_jour);
    
    // Calcul du jour de la semaine du premier jour du mois
    $jour_semaine_premier_jour = date('N', $timestamp_premier_jour);
    
    // Création du tableau HTML
    $tableau = '<table>';
    $tableau .= '<caption>'.date('F Y', $timestamp_premier_jour).'</caption>';
    $tableau .= '<thead><tr><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th></tr></thead>';
    $tableau .= '<tbody>';
    
    // Boucle pour afficher les cases du tableau
    $jour = 1;
    for ($ligne = 1; $ligne <= 6; $ligne++) {
        $tableau .= '<tr>';
        for ($colonne = 1; $colonne <= 7; $colonne++) {
            if ($ligne == 1 && $colonne < $jour_semaine_premier_jour) {
                // Case vide avant le premier jour du mois
                $tableau .= '<td></td>';
            } elseif ($jour > $nb_jours) {
                // Case vide après le dernier jour du mois
                $tableau .= '<td></td>';
            } else {
                // Case avec le jour du mois
                if ($jour == date('j') && $mois == date('n') && $annee == date('Y')) {
                    // Mise en évidence de la date courante
                    $tableau .= '<td class="aujourdhui">'.$jour.'</td>';
                } else {
                    $tableau .= '<td>'.$jour.'</td>';
                }
                $jour++;
            }
        }
        $tableau .= '</tr>';
    }
    
    $tableau .= '</tbody></table>';
    
    return $tableau;
}

?>