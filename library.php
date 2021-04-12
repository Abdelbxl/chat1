<?php

/*
 * Qui est loggué ? 
 */
function get_logged_user($checkin)
{
	// SELECT login FROM `t_user` WHERE `is_logged` = True
	try
	{
		// ouverture de la connexion 
		$db = get_db_param();
		$conn = mysqli_connect( $db["HOST"], $db["USER"], $db["PASSWORD"], $db["DATABASE"] );
		// UTF-8
		mysqli_query($conn, "SET NAMES UTF8" );

		// query 
		$bool = $checkin ? "TRUE" : "FALSE" ;
		echo $query;
		$query = <<< SQL
			SELECT login 
			FROM t_messenger_user
			WHERE is_logged = $bool
SQL;
		$result = mysqli_query($conn, $query );
		$user_a = [];
		
		// lecture du résultat + traitement 
		while ($row = mysqli_fetch_array($result))
		{
			$user_a[] = $row['login'];
		}
		
		// libération espace mémoire
		mysqli_free_result($result);

		// fermeture de la connexion 
		mysqli_close($conn);
		
		return $user_a;
	}
	catch (Exception $e) 
	{
		echo 'ERREUR : ' . $e->getMessage();
		//Closing Connection with Server
		mysqli_close($conn);
	}
}

/* 
 * Modifier le statut d'un utilisateur : qui sort ou qui rentre 
 */
function set_logged_user( $login, $checkin )
{
	try
	{
		// ouvrir la connexion 
		$db = get_db_param();
		$conn = mysqli_connect( $db["HOST"], $db["USER"], $db["PASSWORD"], $db["DATABASE"] );
		// UTF-8
		mysqli_query($conn, "SET NAMES UTF8" );
		$bool = $checkin ? "TRUE" : "FALSE" ;
		
		// écrire et lancez la requête SQL (INSERT)
		$query = <<< SQL
			UPDATE t_messenger_user
			SET is_logged=$bool 
			WHERE login='$login'
SQL;
		// echo $query;
		mysqli_query($conn, $query );
		
		// commit 
		mysqli_commit($conn);
		
		// fermer la connexion 
		mysqli_close($conn);
	}
	catch (Exception $e) 
	{
		echo 'ERREUR : ' . $e->getMessage();
		//Closing Connection with Server
		mysqli_close($conn);
	}
}

/* 
 * form de déconnexion
 */
function display_button_logout()
{
	?>
	<form method="post">
	<div class="button_bar">
		<button type="submit" name="exit">
			Déconnectez-vous 
		</button>
	</div>
	</form>
	<?php
}

/*
 * les options, les choix 
 */
function display_choice()
{
	?>
	<form method="post">
	<!-- 
	<div class="button_bar">
		<button type="submit" name="display_all">
			Afficher tout
		</button>
		<button type="submit" name="display_recent_only">
			Afficher le plus récent 
		</button>
	</div>
	-->

	<div class="button_bar">
		<label for="all">Afficher tout</label>
		<input type="radio" name="display" id="all" value="all">
		
		<label for="recent_only">Afficher le plus récent</label>
		<input type="radio" name="display" id="recent_only" value="recent_only">
		
		<button name="display_go" type="submit">Go</button>
	</div>

	</form>	
	<?php
}

/*
 * validation du login 
 * TODO : remplacer la liste des utilisateurs par une query dans la DB 
 */
function check_login($login)
{
	$identified_user_a = get_logged_user(false);
	
	if( in_array( $login, $identified_user_a ))
	{
		$_SESSION['login'] = $login;
		return true;
	}
	else
	{
		unset($_SESSION['login']);
		return false;
	}
}

/*
 * code à afficher si l'util a moins que 18 ans
 */
function display_unidentified_body()
{
	// moins de 18ans
	echo <<< DODO
	<div style="color:red;">va faire dodo</div>
DODO;
}

/*
 * code à afficher si l'util a plus que 18 ans
 */
function display_identified_body()
{
	?>
	<br/>
	<br/>
	<div>
		<?php
		
		for( $i=1 ; $i<=20 ; $i++ )
		{
			// notation ternaire 
			$style = $i%2==0 ? "line1" : "line2" ;
			// echo avec notation HEREDOC
			echo <<< A
				<div class="$style">
					paragraphe no $i
				</div>
A;
		}
		?>
	<br/>
	<br/>
		<?php

		$nomEtudiant = array( "Julie", "Sophie", "Maxime", "Bertrand", "Arthur" );

		$nomEtudiant = [
			"Julie", 
			"Sophie", 
			"Maxime", 
			"Bertrand", 
			"Arthur",
			"Aziz",
			"Catalin"
		];
		
		foreach( $nomEtudiant as $firstname )
		{
			echo <<< A
				<div>
					étudiant : $firstname
				</div>
A;
		}
		
		echo "<br/>";
		
		foreach( $nomEtudiant as $i => $firstname )
		{
			$style = $i%2==0 ? "line1" : "line2" ;
			echo <<< A
				<div class="$style">
					étudiant : $firstname
				</div>
A;
		}
		
		for( $i=0 ; $i<count($nomEtudiant) ; $i++ )
		{
			$firstname = $nomEtudiant[$i];
			$style = $i%2==0 ? "line1" : "line2" ;
			echo <<< A
				<div class="$style">
					étudiant : $firstname
				</div>
A;
		}
		
		echo "<br/>";

		?>
	<br/>
	<br/>
	</div>
	<div id="deux">
	Mon deuxieme paragraphe.
	Mon deuxieme paragraphe.
	</div>
	<div class="limitedsize">
	Mon DIV paragraphe.
	Mon DIV paragraphe.
	Mon DIV paragraphe.
	Mon DIV 
		<span class="cadre">paragraphe.</span>
		
	Mon DIV paragraphe.
	Mon DIV paragraphe.
	Mon DIV paragraphe.
	Mon DIV paragraphe.
	Mon DIV 			<span class="cadre">paragraphe.</span>
.
	</div>

	<p>
		Voici 
		<a href="https://www.rtl.be/" target="_blank">Mon premier lien</a>.
		Cliquez dessus !
	</p>

	<p>CTRL + F5 : reload complet </p>
	<p>Mon P paragraphe</p>
	<p>Mon P paragraphe</p>
	<p class="autre" style="color:white;">
		Mon P paragraphe
	</p>
	<p>Mon P paragraphe</p>
	<p>Mon P paragraphe</p>


	<img src="https://upload.wikimedia.org/wikipedia/commons/a/a1/Alan_Turing_Aged_16.jpg" 
		 alt="ma première image" />
	<p>Quelle belle image !</p>

	<div class="limitedsize">
		Mon P paragraphe
	</div>	

	<ul>
		<li>UL élément 1</li>
		<li><a href="https://www.rtl.be/" target="_blank">RTL</a></li>
		<li><a href="https://www.qsdfqsfqsdf.be/" target="_blank">SQDFQSDFSQD</a></li>
		<li>élément 3</li>
		<li>élément 4</li>
		<li>élément 5</li>
	</ul>

	<ul class="exo_cascade">
		<li>UL élément 1</li>
		<li><a href="https://www.rtl.be/" target="_blank">Mon 2e lien</a></li>
		<li>élément 3</li>
		<li>élément 4</li>
		<li>élément 5</li>
	</ul>

	<?php	
}

?>