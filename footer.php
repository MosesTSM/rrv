		</main>

		<footer id="footer" class="scroll-section bg-black small-padding small-text">
			<div class="wrapper footer-wrapper center-align">
				<a href="<?php bloginfo('url'); ?>/" class="footer-logo-link">
					<?php get_template_part('inc/icon'); ?>
				</a>


				<div class="footer-notes">
					<div class="copyright">
						&copy;<?php echo date('Y'); ?> Thunderstruck Sales &amp; Marketing | <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a>
					</div>
					<div class="website-by">
						Powered by <a href="https://thunderstrucksales.com" id="website-by-tsm" target="_blank">		
							<svg version="1.1" id="tsm-credit-badge" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26 18" width="26px" height="18px" preserveAspectRatio="xMidYMid meet">
								<polygon class="tsm-badge-uprights tsm-badge-upright-left" points="5.9,0 2,18 8.3,18 9.6,14.9 5.9,14.9 9.1,0 "/>
								<polygon class="tsm-badge-uprights tsm-badge-upright-right" points="20.8,0 17.5,14.9 13.3,14.9 11.1,18 20.1,18 24,0 "/>
								<polygon class="tsm-badge-bolt" points="10.6,0 9.9,3.1 12.8,3.1 10.1,9.4 13.2,9.4 9.6,18 17.5,6.2 14.5,6.2 15.8,3.1 18.6,3.1 19.3,0 "/>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</footer>
		
	</div><!-- Container -->

<?php wp_footer(); ?> <!-- Retrieves the javascript from functions file -->

</body>
</html>