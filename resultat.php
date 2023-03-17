<?php
		if(isset($_GET['engine']) && isset($_GET['q'])) {
		    $engine = $_GET['engine'];
		    $query = urlencode($_GET['q']);
		    $url = "$engine?q=$query";
		    $result = file_get_contents($url);
		    echo $result;
		}
	?>
