<?php
//fonction de débugage : ( permet de faire un print_r() "amélioré" )
function debug( $arg ){

	echo "<div style='background:#fda500; z-index:1000; padding:15px;'>";

		$trace = debug_backtrace();
		//debug_backtrace() : fonction interne de PHP qui retourne un array avec des infos à l'endroit où l'on fait appel à la fonction.

		echo "<p>Debug demandé dans le fichier : ". $trace[0]['file'] ." à la ligne ". $trace[0]['line'] ."</p>";

		echo "<pre>";
			print_r( $arg );
		echo "</pre>";

	echo "</div>";
}
