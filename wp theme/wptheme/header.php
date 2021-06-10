<!DOCTYPE HTML>
<html>
	<head>
		<title><?=bloginfo('name')?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?=wp_head()?>
	</head>
	<body>

		
			<header id="header" class="alt">
				<a href="<?php echo home_url(); ?>">
				<div class="logo"><img class="img-responsive logo-image" src="<?=get_option('logo_path')?>" alt="Logo" /><?=get_option('header_name')?></a></div>
				<a href="#menu">Menu</a>
			</header>

			<?php
				wp_nav_menu([
					'theme_location' => 'header-menu',
					'container_id' => 'menu',
					'menu_class' => 'links'
				]);
			?>

