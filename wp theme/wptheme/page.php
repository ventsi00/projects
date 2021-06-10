<?php
	get_header();
	the_post();
?>

<div class="container" style="min-height: 100%">
	<div class="row" style="padding-top: 2%">
		<div class="col-xs-12">
			<h1 class="text-center"><?=the_title()?></h1>
		</div>
		<div class="col-xs-12">
			<p class="text-justify"><?=get_the_content()?></p>
		</div>
	</div>
</div>	

<?php
	get_footer();
?>