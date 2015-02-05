			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer">

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>


		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

    <?php echo get_development_scripts(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
