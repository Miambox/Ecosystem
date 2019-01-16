	<h1> Eco'FAQ <h1>
		<h2> Bienvenue sur la FAQ ! <h2><br>

			<div class="container">
				<div class="faq">

					<?php if(isset($listeFAQ)) {
			//var_dump($listeFAQ); 
						foreach($listeFAQ as $key => $faq) 
						{ 
	      	//echo $faq["question"];

							echo '<p><strong>' . htmlspecialchars($faq['question']) . '</strong>  ' . htmlspecialchars($faq['reponse']) . '</p>'; 
						}


						?>
					</div>



								</div>

								<?php 

							} 
							?>