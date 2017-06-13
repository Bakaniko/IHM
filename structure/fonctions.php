	<?php
	function debug($variable){
	echo '<pre>'.print_r($variable,true).'</pre>';
	}
	function generer_code($length){# la fonction qui genère un code aléatoire 
		$panier='0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN';# une chaine de caractères 
		return substr(str_shuffle(str_repeat($panier, $length)), 0,$length);# on la repete 60 fois, on la mélange et on pioche 60 caractères 
	}
