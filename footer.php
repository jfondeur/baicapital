		<?php global $currentlang; ?>
		<!-- footer -->
		<footer class="footer text-center py-5" role="contentinfo">
			<div class="container">
				<div class="d-flex justify-content-around">
					<div class="footer-1">
						<a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name')?>" class="footerLogo"></a>
					</div>
					<div class="footer-2">
						<ul class="list-unstyled">
						<?php if($currentlang == 'pt-br'): ?>
							<li class="mb-2"><a href="/?page_id=8">Sobre BAI Capital</a></li>
							<li class="mb-2"><a href="/?page_id=85">Projetos EB5</a></li>
							<li class="mb-2 not-us"><a href="//?page_id=108">Projetos Equity</a></li>
						<?php elseif($currentlang == 'es'): ?>
							<li class="mb-2"><a href="/es/?page_id=323">Sobre BAI Capital</a></li>
							<li class="mb-2"><a href="/es/?page_id=353">Proyetos EB5</a></li>
							<li class="mb-2 not-us"><a href="/?page_id=354">Proyetos Equity</a></li>
						<?php elseif($currentlang == 'en'): ?>
							<li class="mb-2"><a href="/en/?page_id=475">About BAI Capital</a></li>
							<li class="mb-2"><a href="/en/?page_id=489">EB5 Projects</a></li>
							<li class="mb-2 not-us"><a href="/en/?page_id=491">Equity projects</a></li>
						<?php endif;?>
						</ul>
					</div>
					<div class="footer-3">
						<ul class="list-unstyled">
						<?php if($currentlang == 'pt-br'): ?>
							<li class="mb-2"><a href="/?page_id=102/">Equity</a></li>
							<li class="mb-2 not-us"><a href="/?page_id=51">EB5</a></li>
						<?php elseif($currentlang == 'es'): ?>
							<li class="mb-2"><a href="/es//?page_id=347">Equity</a></li>
							<li class="mb-2 not-us"><a href="/es/?page_id=330">EB5</a></li>
						<?php elseif($currentlang == 'en'): ?>
							<li class="mb-2"><a href="/en/?page_id=487">Equity</a></li>
							<li class="mb-2 not-us"><a href="/en/?page_id=485">EB5</a></li>
						<?php endif;?>

						</ul>
					</div>
					<div class="footer-4">
						<ul class="list-unstyled">
							<!-- <li class="mb-2"><a href="#">Imprensa</a></li> -->
						<?php if($currentlang == 'pt-br'): ?>
							<li class="mb-2"><a href="/blog/">Blog</a></li>
						<?php elseif($currentlang == 'es'): ?>
							<li class="mb-2"><a href="/es/blog/">Blog</a></li>
						<?php elseif($currentlang == 'en'): ?>
							<li class="mb-2"><a href="/en/blog/">Blog</a></li>
						<?php endif;?>
						</ul>
					</div>
					<div class="newsletter footer-5">
						<h6 class="brown">Newsletter</h6>
						<?php 
							if($currentlang == 'pt-br'){
								echo '<p>Se inscreva e receba atualizações importantes no seu email</p>';
                                get_template_part('include/optin');
                            }elseif($currentlang == 'es'){
								echo '<p>Si inscribe y recibe actualizaciones importantes en su correo electrónico</p>';
                                get_template_part('include/optin-es');
							}else{
								echo '<p>Sign up for important email updates</p>';
								get_template_part('include/optin-en');
							}
						?>
					</div>
				</div>
			</div>
			<!-- copyright -->
			<p class="copyright mt-5">
				&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Developed by', 'html5blank'); ?>
				<a href="//jeanfondeur.com" title="Jean Fondeur" target="_blank">Jean Fondeur</a>.
			</p>
			<!-- /copyright -->
		</footer>
			<!-- /footer -->
		<?php wp_footer(); ?>
		<script type="text/javascript" src="https://qz363.infusionsoft.com/app/webTracking/getTrackingCode"></script>
		<script type="text/javascript" src="https://qz363.infusionsoft.com/app/timezone/timezoneInputJs?xid=6730495c336af971211de89344250e00"></script>

	</body>
</html>