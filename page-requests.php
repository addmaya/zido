<?php 
	$projects = new WP_Query(array('posts_per_page'=>-1, 'post_type'=>array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'', 'compare'=> '!=')))); 
	$projectsList = array();

	if ($projects->have_posts()){
		$i = 0;
		while ($projects->have_posts() ) {
			$projects->the_post();

			$projectsList[$i]['value'] =  get_the_title().'-'.ucwords(get_post_type());
			$projectsList[$i]['data'] = get_permalink();
			$i++;
		}
		echo json_encode($projectsList);
		wp_reset_postdata();
	}
?>