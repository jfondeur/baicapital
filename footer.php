		<!-- footer -->
		<footer class="footer text-center py-5" role="contentinfo">
			<div class="container">
				<div class="d-flex justify-content-around">
					<div class="footer-1">
						<a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name')?>" class="footerLogo"></a>
					</div>
					<div class="footer-2">
						<ul class="list-unstyled">
							<li class="mb-2"><a href="/sobrebaicapital/">Sobre BAI Capital</a></li>
							<li class="mb-2"><a href="/projetos-eb5/">Projetos EB5</a></li>
							<li class="mb-2"><a href="/projetos-equity/">Projetos Equity</a></li>
						</ul>
					</div>
					<div class="footer-3">
						<ul class="list-unstyled">
							<li class="mb-2"><a href="/investimento-equity/">Equity</a></li>
							<li class="mb-2"><a href="/investimento-eb-5/">EB5</a></li>
						</ul>
					</div>
					<div class="footer-4">
						<ul class="list-unstyled">
							<li class="mb-2"><a href="/blog/">Blog</a></li>
							<!-- <li class="mb-2"><a href="#">Imprensa</a></li> -->
						</ul>
					</div>
					<div class="newsletter footer-5">
						<h6 class="brown">Newsletter</h6>
						<p>Se inscreva e receba atualizações importantes no seu email</p>
						<?php get_template_part('include/optin') ?>
					</div>
				</div>
			</div>
			<!-- copyright -->
			<p class="copyright mt-5">
				&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Desenvolvido', 'html5blank'); ?>
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
