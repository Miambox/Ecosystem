	<h1> Eco'FAQ <h1>
		<h2> Aidez vos clients <h2><br>

			<div class="container">
				<div class="question">

					<?php if(isset($listeFAQ)) {
			//var_dump($listeFAQ);
						foreach($listeFAQ as $key => $faq) 
						{ 
	      	//echo $faq["question"];

							echo '<p><strong>' . htmlspecialchars($faq['question']) . '</strong>  ' . htmlspecialchars($faq['reponse']) . '</p>'; 
						}


						?>
					</div>


					<form action="?Route=admin&Ctrl=faq&Vue=faq" method="post">
						<div class = "formulaire">

							<label for="id_utilisateur"><p>Utilisateur</label> : <input type="text" name="id_utilisateur" id="id_utilisateur" /><br />
								<label for="type"><p>Type</label> : <input type="text" name="type" id="type" /><br />
									<label for="question"><p>Question</label> : <input type="text" name="question" id="question" /><br />
										<label for="reponse"><p>Reponse</label> :  <input type="text" name="reponse" id="reponse" /><br />

											<div class ="bouton" > <input type="submit" value="Envoyer" /> </div>
										</div>
									</form>

								</div>

								<?php 

							} 
							?>