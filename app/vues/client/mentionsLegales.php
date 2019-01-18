	<h1> Eco'MentionsLégales <h1>
		<h2> <h2><br>

			<div class="container">
				<div class="mentionsLegales">

					<?php if(isset($messageMentionsLegales)) {
			//var_dump($listeFAQ); 
						foreach($messageMentionsLegales as $key => $mentionsLegales) 
						{ 
	      	//echo $faq["question"];

							echo '<p><strong>' . htmlspecialchars($mentionsLegales['message']) . '</strong></p>'; 
						}


						?>
					</div>



								</div>

								<?php 

							} 
							?>
