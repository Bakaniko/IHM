	<?php
	function debug($variable){
	echo '<pre>'.print_r($variable,true).'</pre>';
	}
	function generer_code($length){# la fonction qui genère un code aléatoire
		$panier='0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN';# une chaine de caractères
		return substr(str_shuffle(str_repeat($panier, $length)), 0,$length);# on la repete 60 fois, on la mélange et on pioche 60 caractères
	}

	function affDate($date){
    $year = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    $day = substr($date, 8, 2);

    $str = $day." ";
    if($month == 1) $str .= "Janvier";
    if($month == 2) $str .= "F&eacute;vrier";
    if($month == 3) $str .= "Mars";
    if($month == 4) $str .= "Avril";
    if($month == 5) $str .= "Mai";
    if($month == 6) $str .= "Juin";
    if($month == 7) $str .= "Juillet";
    if($month == 8) $str .= "Ao&ucirc;t";
    if($month == 9) $str .= "Septembre";
    if($month == 10) $str .= "Octobre";
    if($month == 11) $str .= "Novembre";
    if($month == 12) $str .= "D&eacute;cembre";
    $str .= " ".$year;

    return $str;
}
