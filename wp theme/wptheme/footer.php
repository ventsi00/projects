			<footer id="footer">
				<div class="copyright">
					<ul class="icons">
						<?php
							if(get_option('twitter')):
						?>
							<li><a href="<?=get_option('twitter')?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<?php
							endif;
						?>
						<?php
							if(get_option('facebook')):
						?>
						<li><a href="<?=get_option('facebook')?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<?php
							endif;
						?>
						<?php
							if(get_option('instagram')):
						?>
						<li><a href="<?=get_option('instagram')?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<?php
							endif;
						?>
						<?php
							if(get_option('snapchat')):
						?>
						<li><a href="<?=get_option('snapchat')?>" class="icon fa-snapchat"><span class="label">Snapchat</span></a></li>
						<?php
							endif;
						?>
					</ul>
					<p>&copy; <?=bloginfo('name')?>. All rights reserved</p>
				</div>
			</footer>
			<?=wp_footer()?>
	</body>
</html>