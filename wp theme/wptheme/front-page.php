<?php
	get_header();

	$categoryFull = new WP_Query([
		'posts_per_page'=>3,
		'category_name' => 'Events',
		'post_status' => 'published'
	]);

	$excludeId = get_cat_ID(get_option('full'));
	$latestPosts = new WP_Query([
		'posts_per_page' => 3, 
		'category__not_in' => [$excludeId]
	]);

?>

<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1><?=get_option('banner_title')?></h1>
						<p><?=get_option('banner_text')?></p>
					</header>
					<a href="#main" class="button big scrolly"><?=get_option('banner_button')?></a>
				</div>
			</section>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
				<?php
					$firstArray = array( 'posts_per_page' => 1, 'category' => get_cat_ID(get_option('first')));

					$first = get_posts( $firstArray );

					foreach ( $first as $post ) : setup_postdata( $post ); ?>

						<section class="wrapper style1">
							<div class="inner">
								<h1 id="right-align"><?=get_option('first')?></h1>
								<!-- 2 Columns -->
								<div class="flex flex-2">
									<div class="col col1">
										<div class="image round fit">
											<a href="<?=get_permalink()?>" class="link"><img src="<?=GetPostImageUrl()?>" style="height:18em; width: 18em" alt="image" /></a>
										</div>
									</div>
									<div class="col col2">
										<h3><?=the_title()?></h3>
										<p><?=mb_substr(get_the_content(),0,90)?></p>
										<a href="<?=get_permalink()?>" class="button">Learn More</a>
									</div>
								</div>
							</div>
						</section>


				<?php endforeach; 
				wp_reset_postdata();?>


					<?php
						$secondArray = array( 'posts_per_page' => 1, 'category' => get_cat_ID(get_option('second')));

						$second = get_posts( $secondArray );

						foreach ( $second as $post ) : setup_postdata( $post ); 
					?>

					<!-- Section -->
						<section class="wrapper style2">
							<div class="inner">
								<h1><?=get_option('second')?></h1>
								<div class="flex flex-2">
									<div class="col col2">
										<h3><?=the_title()?></h3>
										<p><?=mb_substr(get_the_content(),0,90)?></p>
										<a href="<?=get_permalink()?>" class="button">Learn More</a>
									</div>
									<div class="col col1 first">
										<div class="image round fit">
											<a href="<?=get_permalink()?>" class="link"><img src="<?=GetPostImageUrl()?>" style="height:18em; width: 18em" alt="image" /></a>
										</div>
									</div>
								</div>
							</div>
						</section>

					<?php 
						endforeach; 
						wp_reset_postdata();
					?>


				<!-- Section -->
					<section class="wrapper style1">
						<div class="inner">
							<header class="align-center">

								<?php
									if(get_option('full_title')):
								?>

										<h2><?=get_option('full_title')?></h2>

								<?php
									endif;
								?>

								<?php
									if(get_option('full_description')):
								?>

								<p><?=get_option('full_description')?></p>

								<?php
									endif;
								?>

							</header>
							<div class="flex flex-3">

								<?php
									$fullArray = array( 'posts_per_page' => 3, 'category' => get_cat_ID(get_option('full')));

									$full = get_posts( $fullArray );

									foreach ( $full as $post ) : setup_postdata( $post ); 
								?>

								<div class="col align-center">
									<h4><?=the_title()?></h4>
									<div class="image round fit">
										<img style="height:18em; width: 18em" src="<?=GetPostImageUrl()?>" alt="image" />
									</div>
									<p><?=mb_substr(get_the_content(),0,90)?></p>
									<a href="<?=get_permalink()?>" class="button">Learn More</a>
								</div>

								<?php 
									endforeach; 
									wp_reset_postdata();
								?>
								

							</div>
						</div>
					</section>



					<section class="wrapper style1">
						<div class="inner">
							<header class="align-center">

								<?php
									if (get_option('latest_posts')):
								?>

									<h2><?=get_option('latest_posts')?></h2>

								<?php 
									else:
								 ?>
										<h2>Latest Posts</h2>

								<?php
									endif;
								?>

							</header>
							<div class="flex flex-3">

								<?php
									if($latestPosts -> have_posts()):
										while($latestPosts->have_posts()):
											$latestPosts->the_post();
								?>

								<div class="col align-center">
									<h4><?=the_title()?></h4>
									<div class="image square fit">
										<img style="height:18em; width: 18em" src="<?=GetPostImageUrl()?>" alt="image" />
									</div>
									<p><?=mb_substr(get_the_content(),0,90)?></p>
									<a href="<?=get_permalink()?>" class="button">Learn More</a>
								</div>

								<?php
										endwhile;
										wp_reset_postdata();
									endif;
								?>
								

							</div>
						</div>
					</section>

			</div>



<?php
	get_footer();
?>