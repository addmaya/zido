		<?php wp_footer(); ?>
		<script>
			var ajaxURL="<?php echo admin_url('admin-ajax.php'); ?>";
			var posts_per_page = "<?php echo get_option( 'posts_per_page' ); ?>";
		</script>
	</body>
</html>