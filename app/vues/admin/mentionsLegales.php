	<h1> Eco'MentionsLégales <h1>
		<h2> Aidez vos clients <h2><br>

			<div class="container">
				<div class="message">

					<?php if(isset($messageMentionsLegales)) {
			//var_dump($listeFAQ);
						foreach($messageMentionsLegales as $key => $mentionsLegales) 
						{ 
	      	//echo $faq["question"];

							echo '<p><strong>' . htmlspecialchars($mentionsLegales['message']) .'</strong></p>'; 
						}


						?>
					</div>


					<form action="?Route=admin&Ctrl=mentionsLegales&Vue=mentionsLegales" method="post">
						<div class = "ecrire"> 

							<label for="message"><p>Message</label> : <textarea type="text" name="message" id="message" ></textarea>

											<div class ="bouton" > <input type="submit" value="Envoyer" /> </div>
										</div>
									</form>

								</div>

									<?php 

							} 
							?>

								
