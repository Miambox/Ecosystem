<div class="card-question-reponse">
	<?php if(isset($listeFAQ)) {
		foreach($listeFAQ as $key => $faq)
		{
			?>
			<details close>
				<summary>
						<?php echo $faq['question']; ?>
				</summary>
				<?php echo $faq['reponse']; ?>
			</details>
			<?php
		}
	}
	?>
</div>
