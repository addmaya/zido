		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/vendors.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/build/app.js?v0.911"></script>

		<script>
		
		//document.addEventListener('contextmenu', event => event.preventDefault());
		
		var ajaxURL="<?php echo admin_url('admin-ajax.php'); ?>";
		var posts_per_page = "<?php echo get_option( 'posts_per_page' ); ?>";
		var projectsURL = "<?php echo home_url().'/requests'; ?>";
		
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-92157454-1', 'auto');

		Barba.Dispatcher.on('initStateChange', function() {
			ga('send', 'pageview', location.pathname);
		});
		</script>

		<?php wp_footer(); ?>
	</body>
</html>