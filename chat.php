<?php

function display_chat()
{
	?>
	<div class="main_chat"> <!-- cadre bleu -->
		<div class="main_message"
			 style="color:green;" > 
		<!-- cadre orange -->
			<div class="author_message"> <!-- cadre vert-->
				<!-- photo utilisateur -->
				guest :
			</div>
			<div class="body_message">	
				<!-- texte du message -->
				 sldkjhsqdl kfqsdkljsldk d  dsfsdfqsdf 
				 sdfds qsdf
				  qdfsdf qsdf qsdf qsdfqsdf qsdfqsdffqsd
				  fsqdf qsdfqsdf qsdfqsdf qsdf 
			</div>
			<div class="command_message">
				<!-- commandes -->
			</div>
		</div>
		<div class="main_message"
			 style="color:blue;" > 
		<!-- cadre orange -->
			<div class="author_message">
				<!-- cadre vert-->
				<!-- photo utilisateur -->
				admin :
			</div>
			<div class="body_message">	
				<!-- texte du message -->
				 sldkjhsqdl kfqsdkljsldk d  dsfsdfqsdf 
				 sdfds qsdf
				  qdfsdf qsdf qsdf qsdfqsdf qsdfqsdffqsd
				  fsqdf qsdfqsdf qsdfqsdf qsdf 
			</div>
			<div class="command_message">
				<!-- commandes -->
			</div>
		</div>
		<div class="main_message"
			 style="color:green;" > 
		<!-- cadre orange -->
			<div class="author_message"> <!-- cadre vert-->
				<!-- photo utilisateur -->
				guest :
			</div>
			<div class="body_message">	
				<!-- texte du message -->
				 sldkjhsqdl kfqsdkljsldk d  dsfsdfqsdf 
				 sdfds qsdf
				  qdfsdf qsdf qsdf qsdfqsdf qsdfqsdffqsd
				  fsqdf qsdfqsdf qsdfqsdf qsdf 
			</div>
			<div class="command_message">
				<!-- commandes -->
			</div>
		</div>
		<div class="main_message"
			 style="color:blue;" > 
		<!-- cadre orange -->
			<form method="post">
			<div class="author_message">
				<!-- cadre vert-->
				<!-- photo utilisateur -->
				admin :
			</div>
			<div class="body_message">	
				<textarea name="body_message" rows="3">écrivez ici ...</textarea>
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