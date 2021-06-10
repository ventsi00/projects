<?php
wp_enqueue_media();
?>

<style type="text/css">
html {
  height: 100%;
}
body {
  padding:0;
  font-family: sans-serif;
   background: linear-gradient(#141e30, #243b55);
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.form {
	text-align: center;
	padding: 0.5em;
  display: inline-flex;
  margin: 4em;
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.form h2, h3 ,h4, h1 {
  margin: 0 0 1em;
  padding: 0;
  color: #fff;
  text-align: center;
}

.form .user-box {
  position: relative;
}

.form .user-box input {
	text-align: center;
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.form .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.form .user-box input:focus ~ label,
.form .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.form form .submit {
	text-align: center;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.form .submit:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.form .submit span {
  position: absolute;
  display: block;
}

.form .submit span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.form .submit span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.form .submit span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.form .submit span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

.big
{
	display: block;
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

</style>

<script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $('#uploadLogo').click(function(e){
            e.preventDefault();
            if(mediaUploader)
            {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose logo',
                button:{
                    text: 'Choose logo'
                },
                multiple:false
            });

            mediaUploader.on('select', function(){
                attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#logoField').val(attachment.url);
                $('#logoImage').attr('src',attachment.url);
            });

            mediaUploader.open();
        });
    });
</script>


<h1 style="text-align: center;">Images can be changed from "assets/images"</h1>


<div class="form big">
	<form class="inner-form" method="POST" action="options.php">
		<h2>Home page content</h2>
		<hr>
		<?php
			settings_fields('home_page_categories');
		?>
		<div><h3>Upper category</h3></div>
		<h4>Most recent post from chosen category will be shown on front page!</h4>
		
		<?php

		echo '<select name="first">';

			// Get categories as array
			$categories = get_categories( $args );
			foreach ( $categories as $category ) :

			if (strcmp($category->name,get_option('first')))
			{
				echo '<option value="' . $category->name . '">' . $category->name . '</option>';
			}
			else
			{
				echo '<option value="' . $category->name . '" selected>' . $category->name . '</option>';
			}

			endforeach;

		echo '</select>';

		?>


		<div><h3>Middle category</h3></div>
		<h4>Most recent post from chosen category will be shown on front page!</h4>

		<?php

		echo '<select name="second">';

			// Get categories as array
			$categories = get_categories( $args );
			foreach ( $categories as $category ) :

			if (strcmp($category->name,get_option('second')))
			{
				echo '<option value="' . $category->name . '">' . $category->name . '</option>';
			}
			else
			{
				echo '<option value="' . $category->name . '" selected>' . $category->name . '</option>';
			}

			endforeach;

		echo '</select>';

		?>
		

		<div><h3>Bottom category</h3></div>
		<h4>Up to 3 post from chosen category will be shown at bottom of front page (only there not even in blog page)!</h4>

		<?php

		echo '<select name="full">';

			// Get categories as array
			$categories = get_categories( $args );
			foreach ( $categories as $category ) :

			if (strcmp($category->name,get_option('full')))
			{
				echo '<option value="' . $category->name . '">' . $category->name . '</option>';
			}
			else
			{
				echo '<option value="' . $category->name . '" selected>' . $category->name . '</option>';
			}

			endforeach;

		echo '</select>';

		?>

		<div><h3>Bottom category title</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('full_title')?>" name="full_title">
		</div>

		<div><h3>Bottom category description</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('full_description')?>" name="full_description">
		</div>
		<?php
			submit_button();
		?>
	</form>
</div>


<div class="form">
	<form class="inner-form" method="POST" action="options.php">
		<h2>Home page</h2>
		<hr>
		<?php
			settings_fields('home_page');
		?>
		<div><h3>Header name</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('header_name')?>" name="header_name">
	</div>

		<div><h3>Banner title</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('banner_title')?>" name="banner_title">
	</div>

		<div><h3>Banner text</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('banner_text')?>" name="banner_text">
	</div>

		<div><h3>Banner button</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('banner_button')?>" name="banner_button">
	</div>

		<div><h3>"Latest Posts" category title</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('latest_posts')?>" name="latest_posts">
	</div>
		
		<div><h3>Logo</h3></div>
		<div>
			<img style="width: 50%" src="<?=get_option('logo_path')?>" id="logoImage">
		</div>
		<button class="submit" id="uploadLogo">Upload Logo</button>
		<input type="hidden" id="logoField" name="logo_path" value="<?=get_option('logo_path')?>"/>

		<?php
			submit_button();
		?>
	</form>
</div>


<div class="form small">
	<form class="inner-form" method="POST" action="options.php">
		<h2>Blog page</h2>
		<hr>
		<?php
		settings_fields('post_page');
		?>

		<div><h3>"Latest posts" blog title</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('latest_publications')?>" name="latest_publications">
	</div>
		<?php
			submit_button();
		?>
	</form>
</div>

<div class="form">
	<form class="inner-form" method="POST" action="options.php">
		<h2>Footer links</h2>
		<hr>
		<?php
		settings_fields('social_media');
		?>

		<div><h3>Twitter link</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('twitter')?>" name="twitter">
	</div>

		<div><h3>Facebook link</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('facebook')?>" name="facebook">
	</div>

		<div><h3>Instagram link</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('instagram')?>" name="instagram">
	</div>

		<div><h3>Snapchat link</h3></div>
		<div class="user-box">
		<input type="text" value="<?=get_option('snapchat')?>" name="snapchat">
	</div>


		<?php
			submit_button();
		?>
	</form>
</div>

