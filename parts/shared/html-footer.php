		<?php wp_footer(); ?>
		<script>
			var ajaxURL="<?php echo admin_url('admin-ajax.php'); ?>";
			var posts_per_page = "<?php echo get_option( 'posts_per_page' ); ?>";
		</script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-92157454-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</body>
</html>