<div class="mentionLegale">
	<div class="container">
		<div class="mentionsLegales">
			<?php
			if(isset($messageMentionsLegales)) {
				foreach($messageMentionsLegales as $key => $mentionsLegales)
				{
					echo $mentionsLegales['message'];
				}
			}
			?>
		</div>
	</div>
</div>
