
		<!-- footer -->
		<footer class="footer text-center py-5" role="contentinfo">
			<div class="container">
				<div class="d-flex justify-content-around">
					<div class="footer-1">
						<a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name')?>" class="footerLogo"></a>
					</div>
					<div class="footer-2">
						<ul class="list-unstyled">
							<li class="mb-2"><a href="https://baicapital.com/about">About BAI Capital</a></li>
							<li class="mb-2"><a href="https://baicapital.com/eb5-projects">EB5 Projects</a></li>
							<li class="mb-2 not-us"><a href="https://baicapital.com/equity-projects">Equity projects</a></li>
						</ul>
					</div>
					<div class="footer-3">
						<ul class="list-unstyled">
							<li class="mb-2"><a href="https://baicapital.com/equity-investment">Equity</a></li>
							<li class="mb-2 not-us"><a href="https://baicapital.com/en/eb5-investment">EB5</a></li>
						</ul>
					</div>
					<div class="footer-4">
						<ul class="list-unstyled">
							<li class="mb-2"><a href="/">Blog</a></li>
							<li class="mb-2"><a href="https://baicapital.com/contact/">Contact</a></li>
							<li class="mb-2"><a href="https://blog.baicapital.com/legal-notices-and-disclaimers/">Disclaimers</a></li>
						</ul>
					</div>
					<div class="newsletter footer-5 d-none">
						<h6 class="brown">Newsletter</h6>
						<?php 
							get_template_part('include/optin-en');
						?>
					</div>
				</div>
			</div>
			<!-- copyright -->
			<p class="copyright mt-5">
				&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
			</p>
			<!-- /copyright -->
		</footer>
			<!-- /footer -->
		<?php wp_footer(); ?>

	</body>
</html>