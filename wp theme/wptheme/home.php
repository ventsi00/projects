<?php
get_header();
$excludeId = get_cat_ID('Events');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
	'posts_per_page' => get_option('posts_per_page'), 
	'paged' => $paged,
	'category__not_in' => [$excludeId]
];
query_posts($args);
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php
			if (get_option('latest_publications')):
				?>

				<h2><?=get_option('latest_publications')?></h2>

				<?php 
			else:
				?>
				<h2>Latest Posts</h2>

				<?php
			endif;
			?>
		</div>
		<div class="col-xs-8">
			<?php
				if(have_posts()):
					while(have_posts()):
						the_post();

			?>
							<div style="padding: 5em" class="col-md-4 col-sm-4">
						<a href="<?=get_permalink()?>">
							<div class="event-item image round-home fit">
								<img class="img-responsive" style="height:10em; width: 10em" src="<?=GetPostImageUrl()?>"/>
								<h4 style="text-align: center;"><?=the_title()?></h4>
								<p><?=mb_substr(get_the_content(),0,90)?></p>
							</div>
						</a>
					</div>


			<?php
					endwhile;
				endif;
			?>
			<div class="row">
		<div style="text-align: center;" class="col-xs-6">
			<?=previous_posts_link()?>
		</div>
		<div style="text-align: center;" class="col-xs-6">
			<?=next_posts_link()?>
		</div>
	</div>
		</div>
		<div class="col-xs-4">
			<?php
				dynamic_sidebar('sidebar')
			?>
		</div>
	</div>
</div>

<?php
get_footer();
?>