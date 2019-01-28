<form class="" action="?Route=admin&Ctrl=cgu&Vue=editCGU" method="post">
	<input type="submit" name="edit" value="Editer" class="editer-cgu">
</form>

<div class="ecrire-cgu">
	<div class="container-cgu">
		<div class="message">
			<?php
			var_dump($messageCGU);
			if(isset($messageCGU) && $edit != 1) {
				foreach($messageCGU as $key => $cgu)
				{
					echo $cgu['message'];
				}
			}
				?>
		</div>
		<form action="?Route=admin&Ctrl=cgu&Vue=cgu" method="post">
			<div class = "ecrire">
				<textarea type="text" name="message" id="message">
					<?php
					if(isset($messageCGU) && $edit == 1) {
						foreach ($messageCGU as $key => $cgu) {
							echo $cgu['message'];
						}



						?>
					</div>




								</div>
								

									<?php 

							} 
							

					?>
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

