<?php
/*
 * get paramètres de la base
 */
function get_db_param()
{
	// la ligne à modifier quand on change d'hébergeur
	$host = "sql25.phpnet.org"; 
	// $host = "localhost"; 

	switch($host) {
	case "localhost" :
		// implantation locale (WAMP)
		$param_a = [
			"HOST"     => $host, 
			"USER"     => "root",
			"PASSWORD" => "",
			"DATABASE" => "2tppb_messenger"
		];
		break;
	case "sql25.phpnet.org" :
		// implantation sur hébergeur NUXIT , site burotix.be
		$param_a = [
			"HOST"     => $host, 
			"USER"     => "msb77833",
			"PASSWORD" => "GLSb0uhU5W3E",
			"DATABASE" => "msb77833"
		];
		break;
	default:
		echo "Erreur de sélection de base de données";
		break;
	}
	
	return $param_a;
}

/*
 * insère le message dans la DB
 */
function save_message_in_db( $user, $body )
{
	if(empty($body)) return;
	if(empty($user)) return ;

	try
	{
		// ouvrir la connexion 
		$db = get_db_param();
		$conn = mysqli_connect( $db["HOST"], $db["USER"], $db["PASSWORD"], $db["DATABASE"] );
		// UTF-8
		mysqli_query($conn, "SET NAMES UTF8" );
		
		// écrire et lancez la requête SQL (INSERT)
		$query = <<< SQL
			INSERT INTO t_messenger_message
			(sender, body) 
			VALUES ( '$user', '$body' );
SQL;
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
 * affiche tous les messages du chat de la DB
 * param display : all recent_only 
 */
function display_chat($current_user, $display="all" )
{
	$color_a = [
		"admin" => "red",
		"guest" => "blue",
		"custom"=> "gray",
	];
	
	?>
	<div class="main_chat"> <!-- cadre bleu -->
	<?php
	try
	{
		// ouverture de la connexion 
		$db = get_db_param();
		$conn = mysqli_connect( $db["HOST"], $db["USER"], $db["PASSWORD"], $db["DATABASE"] );
		// UTF-8
		mysqli_query($conn, "SET NAMES UTF8" );

		// query 
		// option SQL "LIMIT" 
		// par ex. LIMIT 5 == 5 enregistrements 
		// 
		// paramétrer la requête SQL en fonction 
		// du choix de l'utilisateur (RADIO) 
		// '2021-03-22 16:00:00'
		switch ( $display) {
		case "all":
			$query = <<< SQL
				SELECT sender, body 
				FROM t_messenger_message 
				WHERE is_active=TRUE 
				ORDER BY `sent_date` ASC
SQL;
			break; 
		case "recent_only" :
			$query = <<< SQL
				SELECT sender, body 
				FROM t_messenger_message 
				WHERE is_active=TRUE 
				  AND sent_date >= "{$_SESSION['login_date']}"
				ORDER BY `sent_date` ASC
SQL;
			break;
		}
		// echo $query;

		$result = mysqli_query($conn, $query );
		
		// lecture du résultat + traitement 
		while ($row = mysqli_fetch_array($result))
		{
			$user_class = "";
			// choix de la classe d'affichage du message 
			// si $row['sender'] == personne logguée alors $user_class = "..."
			// sinon $user_class = "...." 
			?>
			<div class="main_message $user_class" style="color:<?=$color_a[$row['sender']]?>;" > 
				<div class="author_message"> 
					<!-- photo utilisateur -->
					<?=$row['sender'];?>
				</div>
				<div class="body_message">	
					<!-- texte du message -->
					<?=$row['body'];?>
				</div>
				<div class="command_message">
					<!-- commandes -->
					<!-- <button>delete</button> -->
				</div>
			</div>			
			<?php
		}
		
		// libération espace mémoire
		mysqli_free_result($result);

		// fermeture de la connexion 
		mysqli_close($conn);

	}
	catch (Exception $e) 
	{
		echo 'ERREUR : ' . $e->getMessage();
		//Closing Connection with Server
		mysqli_close($conn);
	}

	?>
		<div class="main_message $user_class" style="color:<?=$color_a[$_SESSION['login']]?>;" > 
		<!-- cadre orange -->
			<form method="post">
			<div class="author_message">
				<!-- cadre vert-->
				<!-- photo utilisateur -->
				<?php echo $current_user; ?>
			</div>
			<div class="body_message">	
				<textarea 
					name="body_message" 
					placeholder="écrivez ici ..."
					rows="3"></textarea>
			</div>
			<div class="command_message">
				<!-- commandes -->
				<button name="send_message" type="submit">
					envoyez le message
				</button>
			</div>
			</form>
		</div>
	</div>
	<?php
}


?>