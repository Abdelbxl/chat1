<?php
include("library.php");
include("chat_db.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Messagerie ISFCE</title>
	<meta http-equiv="refresh" content="120">
	<?php
	// appliquer le thème choisi par l'utilisateur au moment du login 
	// $user_theme = $_POST .... 
	$user_theme = "default_theme";
	?>
	<link rel="stylesheet" href="media/<?=$user_theme?>.css" />
	<style>
		div.line1
		{
			background-color:lightgrey;
		}
		div.line2
		{
			background-color:lightgreen;
		}
	</style>
	<script
	 src="https://code.jquery.com/jquery-3.4.1.js"   
	 integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	 crossorigin="anonymous" ></script>
	<script>
	
	$(function() {
	  // alert("Hello !");
	});
	
	$( window ).unload(function() {
	  alert("Bye now!");
	});
	</script>
</head>
<body>
	<h1>Messagerie <span class="lignes">ISFCE</span></h1> 

	<?php
	/*
	echo "<div>SESSION</div>";
	var_dump($_SESSION);
	echo "<div>POST</div>";
	var_dump($_POST);
	*/

	if(isset($_POST['exit']))
	{
		// l'utilisateur sort de sa session
		echo "<div>Au revoir {$_SESSION['login']}</div>";
		set_logged_user( $_SESSION['login'], false );
		unset($_SESSION['login']);
	}
	
	if(isset($_POST['send']))
	{
		// tentative d'identification 
		// le bouton 'envoyer' a été cliqué 
		
		$is_valid = check_login($_POST['login']);

		if( ! $is_valid )
		{
			display_unidentified_body();
		}
		
		if( $is_valid )
		{
			set_logged_user( $_SESSION['login'], true );

			date_default_timezone_set("Europe/Brussels");
			// $x = date("Y-m-d-H-i-s");
			// echo $x;
			$_SESSION['login_date'] = date("Y-m-d H:i:s");
		}
	}
	
	if( ! isset($_SESSION['login']))
	{
		// util non identifié 
		$user_a = get_logged_user(false);
		$logged_user_nb = count(get_logged_user(true));
		$logged_user_total = count($user_a) + $logged_user_nb;
		?>
		<div>Il y a <?=$logged_user_nb?>/<?=$logged_user_total?> utilisateur(s) dans le salon.</div>
		<div>Pseudo ? Choisissez parmi les nicknames disponibles !</div>

		<form method="post">
		<!-- input type="text" name="login"></input -->
		<select name="login">
		  <option value=""></option>
		  <?php 
		  foreach( $user_a as $user )
		  {
			  echo <<< HTML
				<option value="$user">$user</option>
HTML;
		  }
		  ?>
		</select>
		<button type="submit" name="send">
			Connectez-vous 
		</button>
		</form>

		<?php
	}
	
	if( isset($_SESSION['login']) )
	{
		// user identifié 
		echo <<< HELLO
			<div>Bonjour "{$_SESSION['login']}". Vous êtes connecté. </div>
HELLO;
		
		// on présente les personnes dans le salon
		$user_a = get_logged_user(true);
		$user_s = implode( ", ", $user_a);
		echo <<< USER
			<div>Présentes dans ce salon : $user_s</div>
USER;
		/// form déconnexion
		display_button_logout();
		
		// pour choisir certaines options 
		display_choice();
		
		// traitement du texte introduit 
		if(isset($_POST['send_message']))
		{
			// l'util a cliqué sur le bouton send_message
			// on introduit le message envoyé dans la DB
			save_message_in_db( $_SESSION['login'], $_POST['body_message'] );
			/* 			echo <<< MSG
							<div>
								Message envoyé par
								{$_SESSION['login']}: <br/>
								{$_POST['body_message']}
							</div>
			MSG; */
		}
		
		// option : display all ou recent only ? 
		if(isset($_POST['display_go']))
		{
			$_SESSION['display'] = $_POST['display'];
		}
		if( ! isset($_SESSION['display'])) $_SESSION['display'] = "all";
		
		// page principale 
		display_chat($_SESSION['login'], $_SESSION['display'] );
		
	}
		
	?>
</body>
</html>
