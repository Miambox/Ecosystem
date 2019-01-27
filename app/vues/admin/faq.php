<div class="container-faq">
	<div class="card-question-reponse">
		<?php if(isset($listeFAQ)) {
			foreach($listeFAQ as $key => $faq)
			{
				?>
				<details close>
					<summary>
						<div class="">
							<?php echo $faq['question']; ?>
						</div>
						<div class="">
							<form class="" action="?Route=admin&Ctrl=faq&Vue=editerFaq" method="post">
								<input type="hidden" name="id_faq" value="<?= $faq['id'] ?>">
								<input type="submit" name="" value="edit">
							</form>
							<form class="" action="?Route=admin&Ctrl=faq&Vue=supprimerFaq" method="post">
								<input type="hidden" name="id_faq" value="<?= $faq['id'] ?>">
								<input type="submit" name="" value="supprimer">
							</form>
						</div>
					</summary>
					<?php echo $faq['reponse']; ?>
				</details>
				<?php
			}
		}
		?>
	</div>

	<form action="?Route=admin&Ctrl=faq&Vue=faq" method="post">
			<?php
			if(isset($listeFAQByID)) {
				foreach ($listeFAQByID as $key => $value) {
					?>
					<div class="question_faq">
						<input type="text" name="question_edit" value="<?= $value['question'] ?>">
					</div>

					<div class="reponse_faq">
						<textarea name="reponse_edit" id="reponse"><?= $value['reponse'] ?></textarea>
						<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
						<script>
						CKEDITOR.replace( 'reponse');
						</script>
					</div>
					<input type="hidden" name="id_faq" value="<?= $value['id'] ?>">
					<?php
				}
			} else {
				?>
				<div class="question_faq">
					<input type="text" name="question" value="" placeholder="Question à ajouter ?">
				</div>

				<div class="reponse_faq">
					<textarea name="reponse" id="reponse">Votre réponse</textarea>
					<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
					<script>
					CKEDITOR.replace( 'reponse');
					</script>
				</div>
				<?php
			}
			if($edit != 0) {
				?>
				<input type="submit" value="Editer" />
				<?php
			} else {
				?>
				<input type="submit" value="Envoyer" />
				<?php
			}
			?>
	</form>
</div>
