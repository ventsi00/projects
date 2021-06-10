<?php
	get_header();
	the_post();
?>
	<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							<header class="align-center">
								<h1><?=the_title()?></h1>
							</header>
							<div class="flex flex-2">
								<div class="col col2">
									<p><?=the_content()?></p>
								</div>
								<div class="col col1 first">
									<div class="image round fit">
										<img  style="width: 18em; height: 18em" src="<?=GetPostImageUrl()?>" alt="" />
									</div>
								</div>
							</div>
						</div>
					</section>
			</div>

<?php
	get_footer();
?>