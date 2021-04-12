<html>
<pre>
<?php

// $str : mot de passe entré maintenant par
// l'utilisateur dans un form d'identification
$str = 'apple';

// mot de passe précédemment stocké en database 
// lors de l'inscription 
// '1f3870be274f6c49b3e31a0c6728957f'
if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') 
{
    echo "Bienvenue au club \n";
	// affichage de la page
}
else
{
	echo "Va faire dodo. \n";
}


$str = 'AlainWafflard';
$crypt = md5($str);
echo $str . ":" . $crypt . "\n";

$str = 'AlainWafflart';
$crypt = md5($str);
echo $str . ":" . $crypt . "\n";

$str = 'AlainWafflarD';
$crypt = md5($str);
echo $str . ":" . $crypt . "\n";

$str = 'Alain Wafflard';
$crypt = md5($str);
echo $str . ":" . $crypt . "\n";


?>
</pre>


</html>