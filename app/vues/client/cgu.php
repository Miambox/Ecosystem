<div class="container">
	<div class="cgu-client">
		<div class="container-cgu">
			<div class="cgu">
				<?php
				if (isset($messageCGU)) {
					foreach ($messageCGU as $key => $cgu) {
						echo $cgu['message'];
					}
				}
				?>
			</div>
		</div>
	</div>
</div>