<?php
	require_once( 'external/starkers-utilities.php' );
	add_theme_support('post-thumbnails');	
	function starkers_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ($comment->comment_approved == '1'): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	show_admin_bar(false);

	function checkNum($num){
	  return ($num%2) ? TRUE : FALSE;
	}

	function disable_wp_emojicons() {
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}
	//add_action( 'init', 'disable_wp_emojicons' );

	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	
	add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
	function remove_jquery_migrate( &$scripts)
	{
	    if(!is_admin())
	    {
	        $scripts->remove( 'jquery');
	        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	    }
	}
	remove_action('wp_head','rest_output_link_wp_head');
	remove_action('wp_head','wp_oembed_add_discovery_links');
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);


	add_action( 'admin_init', 'hide_editor' );
	function hide_editor() {
	  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	  if( !isset( $post_id ) ) return;
	  
	  $page = get_the_title($post_id);
	  if(!in_array($page, array('all'), true )){ 
	    remove_post_type_support('page', 'editor');
	  }

	  $template_file = get_post_meta($post_id, '_wp_page_template', true);
	  if($template_file == 'my-page-template.php'){
	    remove_post_type_support('page', 'editor');
	  }
	}

	function time_ago(){
		return human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
	}

	function get_post_thumb(){
		if (has_post_thumbnail($post->ID)){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			return $image[0];
		}
	}

	function get_post_thumb_medium(){
		if (has_post_thumbnail($post->ID)){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium_large' );
			return $image[0];
		}
	}

	function get_category_count($id){
		$cat = get_category($id);
		$cat_count = $cat->category_count;
		return $cat_count;
	}

	function fetch_projects(){
		$offset = intval($_GET['offset']);
		$index = intval($_GET['index']) + 1;
		$year = $_GET['year'];
		$method = $_GET['query'];
		$post_type = $_GET['post_type'];
		$tag = intval($_GET['tag']);
		
		$category_balance = 0;
		$html = '';
		$class = '';

		$projects_args = array();
		$collection_args = array();

		if($post_type == 'all'){
			$post_type = array('wedding', 'engagement');
		}

		if(!$tag){
			if($post_type != 'video'){
				if ($year != 'all') {
					if($method == 'update'){
						$projects_args = array('post_type'=>$post_type, 'offset'=>$offset, 'date_query' => array(array('year'=>$year)), 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
					}
					else{
						$projects_args = array('post_type'=>$post_type, 'date_query' => array(array('year'=>$year)), 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
					}
					$collection_args = array('post_type'=>$post_type, 'posts_per_page'=>'-1', 'date_query' => array(array('year'=>$year)), 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
				} else{
					if($method == 'update'){
						$projects_args = array('post_type'=>$post_type, 'offset'=>$offset, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
					} else{
						$projects_args = array('post_type'=>$post_type, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
					}
					$collection_args = array('posts_per_page'=>'-1', 'post_type'=>$post_type, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
				}
			}
			else {//videos
				if ($year != 'all') {	
					if($method == 'update'){
						$projects_args = array('post_type'=> array('wedding', 'engagement'), 'offset'=>$offset, 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!=')), 'date_query' => array(array('year'=>$year)));
					}
					else {
						$projects_args = array('post_type'=> array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!=')), 'date_query' => array(array('year'=>$year)));
					}

					$collection_args = array('posts_per_page'=>'-1', 'post_type'=> array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!=')), 'date_query' => array(array('year'=>$year)));
				}
				else {
					if($method == 'update'){
						$projects_args = array('post_type'=> array('wedding', 'engagement'), 'offset'=>$offset, 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!=')));
					}
					else{
						$projects_args = array('post_type'=> array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!=')));
					}
					$collection_args = array('posts_per_page'=>'-1', 'post_type'=> array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!=')));
				}
			}
		}
		else{
			$projects_args = array('post_type'=>$post_type, 'offset'=>$offset, 'tag_id'=>$tag, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
			$collection_args = array('posts_per_page'=>'-1', 'post_type'=>$post_type, 'tag_id'=>$tag, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')));
		}

		$projects = new WP_Query($projects_args);
		$collection = new WP_Query($collection_args);

		if ($projects->have_posts()){
			while ($projects->have_posts()){
				$projects->the_post();
				$pjt_title = str_replace(' and ', '<span> & </span>', get_the_title());
				$pjt_thumb = get_post_thumb();
				$pjt_thumb_medium = get_post_thumb_medium();
				$pjt_link = get_permalink();
				$pjt_date = time_ago();
				$pjt_video = get_youtube_id(get_field('pt_video'));
				$projects_count = $projects->post_count;
				$collection_count = $collection->post_count;
				$pjt_album = get_field('pmt_album');
				$pjt_video_thumb = get_field('pt_video_thumb');

				if($index > 8){
					$index = 1;
				}
				if(($index == 3) || ($index == 8)){
					$class = 'u-full';
				} 
				else {
					$class = 'u-half';
				}

				if($method == 'fetch'){
					if($projects_count > 0){			
						$category_balance = $collection_count - $projects_count;
						if ($category_balance < 0){
							$category_balance = 0;
						}
					}
				}
				else{
					if($collection_count > 0){
						$category_balance = $collection_count - ($offset * 2);
						if($category_balance < 0){
							$category_balance = 0;
						}
					}
				}


				if($post_type == 'video'){
					if(!$pjt_thumb){
						$pjt_thumb = $pjt_video_thumb;
					}
					$html .= '<div data-overflow="'.$category_balance.'" data-index="'.$index.'" class="is-appended o-album '.$class.'" data-aos="fade-up" data-aos-duration="800"><a href="'.$pjt_link.'" class="js-video no-barba" data-video="'.$pjt_video.'"><span class="o-icon s--video"></span><div class="o-spinner__wrap"><div class="o-spinner"></div></div><div class="c-edges"><div class="o-edge s--tl"><span></span><span></span></div><div class="o-edge s--tr"><span></span><span></span></div><div class="o-edge s--bl"><span></span><span></span></div><div class="o-edge s--br"><span></span><span></span></div></div><span class="o-line"></span><figure class="o-album__cover js-lazy" data-thumb="'.$pjt_thumb.'"></figure><section class="o-album__info"><h3>'.$pjt_title.'</h3><ul class="o-meta"><li>'.$pjt_date.'</li></ul></section></a></div>';
				}
				else{
					if (is_array($pjt_album)) {
						$html .= '<div data-overflow="'.$category_balance.'" data-index="'.$index.'" class="is-appended o-album '.$class.'" data-aos="fade-up" data-aos-duration="800"><a data-target="'.get_post_type().'" href="'.$pjt_link.'"><div class="o-spinner__wrap"><div class="o-spinner"></div></div><div class="c-edges"><div class="o-edge s--tl"><span></span><span></span></div><div class="o-edge s--tr"><span></span><span></span></div><div class="o-edge s--bl"><span></span><span></span></div><div class="o-edge s--br"><span></span><span></span></div></div><span class="o-line"></span><figure class="o-album__cover js-lazy" data-thumb="'.$pjt_thumb.'" data-thumb-medium="'.$pjt_thumb_medium.'"></figure><section class="o-album__info"><h3>'.$pjt_title.'</h3><ul class="o-meta"><li>'.$pjt_date.'</li></ul></section></a></div>';
					}
				}
				$index ++;
			}
			wp_reset_postdata();
			echo $html;
			die();
		}
	}
	add_action('wp_ajax_nopriv_fetch_projects', 'fetch_projects');
	add_action('wp_ajax_fetch_projects', 'fetch_projects');
	function get_youtube_id($url){
        parse_str(parse_url($url, PHP_URL_QUERY ), $yt_id);
        return $yt_id['v'];  
    }

    function namespace_add_custom_types( $method ) {
	  if( is_category() || is_tag() && empty( $method->query_vars['suppress_filters'] ) ) {
	    $method->set( 'post_type', array('wedding', 'engagement'));
		 return $method;
		}
	}
	add_filter( 'pre_get_posts', 'namespace_add_custom_types' );


	add_action('admin_post_request_quote', 'request_quote');
	add_action('admin_post_nopriv_request_quote', 'request_quote');
	
	function return_yes($a){
		if($a){return 'Yes';}
	}
	function return_input_value($a){
		if(isset($_POST[$a])){
			return trim($_POST[$a]);
		}
	}

	function return_email($a){
		if(isset($_POST[$a])) {
			$userEmail = trim($_POST[$a]);
			if(($userEmail != 'Email') && (preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", $userEmail))){
				return $userEmail;
			}
		}
	}

	function request_quote(){
		if (isset($_POST['form_spam_key']) && $_POST['form_spam_key']==''){
			if(isset($_POST['form_nonce']) || wp_verify_nonce($_POST['form_nonce'], 'form_nonce_key')){
				$emailto = 'ask@paramount.ug';
				if(isset($_POST['userName'])){
					$name = trim($_POST['userName']);
				}
				if(isset($_POST['userTelephone'])){
					$number = trim($_POST['userTelephone']);
				}			
				if(isset($_POST['userEmail'])){
					$email = return_email('userEmail');
				}	
				if(return_input_value('albumCount') != 'other'){
					$albumCount = return_input_value('albumCount');
				}
				else{
					$albumCount = return_input_value('otherAlbumCount');
				}

				$headers[] = 'From: '.$name.' <'.$email.'>';
				$headers[] = 'Reply-To: '.$name.' <'.$email.'>';

				if(isset($_POST['userEvent'])){
					$event = trim($_POST['userEvent']);			
					if($event == '1'){
						$body = 'Email: '.$email."\n".
								'Name: '.$name."\n".
								'Phone Number: '.$number."\n".
								'Event: Wedding'."\n".
								'Wedding Date: '.return_input_value('weddingDate')."\n".
								'Wedding Venue: '.return_input_value('weddingLocation')."\n".
								'Camera Men: '.return_input_value('cameramenCount')."\n".
								'Projectors: '.return_input_value('projectorCount')."\n".
								'Plasma Screens: '.return_input_value('plasmaCount')."\n".
								'LED Screens: '.return_input_value('ledCount')."\n".
								'Recording Hours: '.return_input_value('recordingHours')."\n".
								'Video Lenght: '.return_input_value('videoLength')."\n".
								'Photographers: '.return_input_value('photographersCount')."\n".
								'Photo Books: '.return_input_value('photoBookCount')."\n".
								'Photos in Album: '.$albumCount."\n".
								'Soft Copy Photos: '.return_input_value('softCopy')."\n".
								'Guest Books: '.return_input_value('guestBookCount')."\n".
								'Signing Photos: '.return_input_value('signingPhotoCount')."\n".
								'Boards: '.return_input_value('boardsCount')."\n".
								'Same Day Edit: '.return_yes(return_input_value('sameDay'))."\n".
								'Photo Booth: '.return_yes(return_input_value('photoBooth'))."\n".
								'Engagement Shoot: '.return_yes(return_input_value('memoryLane'))."\n".
								'Post Wedding Shoot: '.return_yes(return_input_value('engagementShoot'))."\n".
								'Wedding Banner: '.return_yes(return_input_value('postWeddingShoot'))."\n".
								'Bridal Shower: '.return_yes(return_input_value('weddingBanner'))."\n".
								'Bridal Shower: '.return_yes(return_input_value('bridalShower'))."\n".
								'Bachelorette Party: '.return_yes(return_input_value('bacheloretteParty'))."\n".
								'Bachelor Party: '.return_yes(return_input_value('bachelorParty'))."\n".
								'Kasuzekatya: '.return_yes(return_input_value('kasuzekatya'))."\n".
								'Comment: '.return_input_value('weddingComment')."\n";
					}

					if($event == '2'){
						$body = 'Email: '.$email."\n".
								'Name: '.$name."\n".
								'Phone Number: '.$number."\n".
								'Event: Engagement'."\n".
								'Date: '.return_input_value('engagementDate')."\n".
								'Venue: '.return_input_value('engagementLocation')."\n".
								'Shooting Hours: '.return_input_value('shootHours')."\n".
								'Video: '.return_yes(return_input_value('engagementVideo'))."\n".
								'Soft Copy: '.return_yes(return_input_value('engagementSoftCopy'))."\n".
								'Comment: '.return_input_value('engagementComment')."\n";
					}

					if($event == '3'){
						$body = 'Email: '.$email."\n".
								'Name: '.$name."\n".
								'Phone Number: '.$number."\n".
								'Event: Other'."\n".
								'Comment: '.return_input_value('otherComment')."\n";
					}

					wp_mail($emailto, 'Request for Quotation', $body, $headers);	
				}
				if(isset($_POST['userMessage'])){
					$message = trim($_POST['userMessage']);
					$body = 'Email: '.$email."\n".'Name: '.$name."\n".'Phone Number: '.$number."\n".'Message: '.$message;
					wp_mail($emailto, 'Paramount Website Comment', $body, $headers);	
				}
			}
			else {exit;
			}	
		}
		else {exit;
		}	
	}

	function my_deregister_scripts(){
	  wp_deregister_script( 'wp-embed' );
	}
	add_action( 'wp_footer', 'my_deregister_scripts' );

	function get_youtube_meta($yt_id){
		$yt_apikey = 'AIzaSyCuQTR5LVpmHgs2EPrhBVbAGjmHunxTmMk';
		$yt_query = wp_remote_get('https://www.googleapis.com/youtube/v3/videos?id='.$yt_id.'&key='.$yt_apikey.'&fields=items(snippet(title,description,publishedAt,thumbnails(maxres,default)),statistics(viewCount))&part=snippet,statistics');
		$yt_response = json_decode($yt_query['body']);
		$yt_meta['yt_thumb'] = $yt_response->items[0]->snippet->thumbnails->maxres->url;
        $yt_meta['yt_thumb_std'] = $yt_response->items[0]->snippet->thumbnails->default->url;
		return $yt_meta;
	}

	add_action('acf/save_post', 'save_video', 20);
	function save_video( $post_id ) {
	    global $post; 
	    if ( ($post->post_type == 'wedding') || ($post->post_type == 'engagement') ){
	        $pt_video = get_post_meta($post_id, 'pt_video', true);
	        if($pt_video){
		        $yt_video_id = get_youtube_id($pt_video);
		        $yt_video = get_youtube_meta($yt_video_id);
		        
		        $yt_thumb = $yt_video['yt_thumb'];
		        $yt_thumb_std = $yt_video['yt_thumb_std'];
		        	        
		        if($yt_thumb != ''){
		            update_field('pt_video_thumb', $yt_thumb, $post_id);
		        }
		        else{
		            update_field('pt_video_thumb', $yt_thumb_std, $post_id);
		        }
	        }
	    }
	}

	 function my_acf_admin_head() {
	 ?>
	     <style type="text/css">
	         #acf-group_58c3f43471e6f, #acf-group_58c4665bdf1d3{display: none}
	     </style>
	     <?php
	 }
	add_action('acf/input/admin_head', 'my_acf_admin_head');

	// function get_custom_feeds($feed_query) {
	// 	if (isset($feed_query['feed']) && !isset($feed_query['post_type']))
	// 		$feed_query['post_type'] = array('wedding', 'engagement');
	// 	return $feed_query;
	// }
	// add_filter('request', 'get_custom_feeds');

	function wcs_post_thumbnails_in_feeds( $content ) {
	    global $post;
	    $brief = get_field('pmt_brief', $post->ID);
	    if( has_post_thumbnail( $post->ID ) ) {
	        $content = '<p><a href="'.get_permalink().'"><img src="' . get_post_thumb_medium() .'" /></a>'. $brief . '</p>' . $content;
	    }
	    return $content;
	}
	add_filter( 'the_excerpt_rss', 'wcs_post_thumbnails_in_feeds' );
	add_filter( 'the_content_feed', 'wcs_post_thumbnails_in_feeds' );
	
	function remove_menus(){
	  global $menu;
	  global $submenu;
	  //remove_menu_page( 'index.php' );                 
	  remove_menu_page( 'jetpack' ); 
	  remove_menu_page( 'edit.php' ); 
	  remove_menu_page( 'upload.php' );              
	  // remove_menu_page( 'edit.php?post_type=page' );    
	  remove_menu_page( 'edit-comments.php' );          
	  remove_menu_page( 'themes.php' );                
	  remove_menu_page( 'plugins.php' );         
	  remove_menu_page( 'users.php' );                
	  remove_menu_page( 'tools.php' );
	}
	add_action( 'admin_menu', 'remove_menus' );
	
	function admin_default_page() {
	  return 'wp-admin/edit.php?post_type=wedding';
	}
	//add_filter('login_redirect', 'admin_default_page');

	function remove_dashboard_widgets() {
		global $wp_meta_boxes;

		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

	}

	add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
	remove_action('welcome_panel', 'wp_welcome_panel');

?>