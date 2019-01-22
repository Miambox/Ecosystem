<div class="mentionLegale">
	<div class="container-mentions">
		<div class="message">
			<?php
			if(isset($messageMentionsLegales)) {
				foreach($messageMentionsLegales as $key => $mentionsLegales)
				{
					echo $mentionsLegales['message'];
				}
			}
				?>
		</div>
		<form action="?Route=admin&Ctrl=mentionsLegales&Vue=mentionsLegales" method="post">
			<div class = "ecrire">
				<textarea type="text" name="message" id="message" >

				</textarea>
				<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
				<script>
					CKEDITOR.replace( 'message');
				</script>
				<input type="submit" value="Envoyer" class="send-message"/>
			</div>
		</form>
	</div>
</div>
