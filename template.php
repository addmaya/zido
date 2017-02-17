<?php /*Template Name: Archive */?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$page_title ='';
	$post_type='';
	$posts_per_page = get_option('posts_per_page');
	
	if(is_page('weddings')){
		$page_title = 'Weddings';
		$post_type = 'wedding';
	}
	if(is_page('engagements')){
		$page_title = 'Engagements';
		$post_type = 'engagement';
	}

	$posts = new WP_Query(array('posts_per_page'=>-1, 'post_type'=>$post_type, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'0', 'compare'=> '!='))));
	$posts_count = $posts->post_count;
	$posts_excess = $posts_count - $posts_per_page;
	wp_reset_postdata();

	if(is_page('video')){
		$videos = new WP_Query(array('posts_per_page'=>-1, 'post_type'=>array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!='))));
		$posts_count = $videos->post_count;
		$page_title = 'Video';
		wp_reset_postdata();
	}
?>
<section>
	<div class="u-box">
		<header class="o-header">
			<section>
				<h1><?php the_title(); ?> <span class="u-super"><?php echo $posts_count; ?></span></h1>
			</section>
			<section>
				<div class="u-wrap o-header__brief">
					<p><?php the_field('pmt_sct_brief'); ?></p>
					<span class="o-line"></span>
				</div>
			</section>
		</header>
		<?php 
			$projects = new WP_Query(array('post_type'=>$post_type, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'0', 'compare'=> '!=')))); 
			if(is_page('video')){
				$projects = new WP_Query(array('post_type'=>array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pt_video', 'value'=>'', 'compare'=> '!='))));
			}
			if ($projects->have_posts()): ?>
		<div class="o-collection">
			<header>
				<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/filter')); ?>
			</header>
			<section class="u-clear o-collection__list">
				<?php $p = 1; ?>
				<?php while ($projects->have_posts() ) : $projects->the_post();
					$pjt_title = get_the_title();
					$pjt_thumb = get_post_thumb();
					$pjt_link = get_permalink();
					$pjt_date = time_ago();
					$pjt_video = get_youtube_id(get_field('pt_video'));
					if($p > 8){$p = 1;}
				?>
					<?php if((is_page('video'))){ ?>
						<?php if ($pjt_video): ?>
							<div data-index="<?php echo $p; ?>" class="o-album <?php if(($p == 3) || ($p == 8)){echo 'u-full';} else{echo 'u-half';} ?>" data-aos="fade-up" data-aos-duration="800">
								<a href="<?php echo $pjt_link; ?>" class="js-video no-barba" data-video="<?php echo $pjt_video; ?>">
									<span class="o-icon s--video"></span>
									<div class="o-spinner__wrap"><div class="o-spinner"></div></div>
									<div class="c-edges">
										<div class="o-edge s--tl"><span></span><span></span></div>
										<div class="o-edge s--tr"><span></span><span></span></div>
										<div class="o-edge s--bl"><span></span><span></span></div>
										<div class="o-edge s--br"><span></span><span></span></div>
									</div>
									<span class="o-line"></span>
									<figure class="o-album__cover js-lazy" data-thumb="<?php echo $pjt_thumb; ?>"></figure>
									<section class="o-album__info">
										<h3><?php echo $pjt_title; ?></h3>
										<ul class="o-meta">
											<li><?php echo $pjt_date; ?></li>
										</ul>
									</section>
								</a>
							</div>
						<?php endif ?>
					<?php } else {?>
						<div data-index="<?php echo $p; ?>" class="o-album <?php if(($p == 3) || ($p == 8)){echo 'u-full';} else{echo 'u-half';} ?>" data-aos="fade-up" data-aos-duration="800">
							<a href="<?php echo $pjt_link; ?>">
								<div class="o-spinner__wrap"><div class="o-spinner"></div></div>
								<div class="c-edges">
									<div class="o-edge s--tl"><span></span><span></span></div>
									<div class="o-edge s--tr"><span></span><span></span></div>
									<div class="o-edge s--bl"><span></span><span></span></div>
									<div class="o-edge s--br"><span></span><span></span></div>
								</div>
								<span class="o-line"></span>
								<figure class="o-album__cover js-lazy" data-thumb="<?php echo $pjt_thumb; ?>"></figure>
								<section class="o-album__info">
									<h3><?php echo $pjt_title; ?></h3>
									<ul class="o-meta">
										<li><?php echo $pjt_date; ?></li>
									</ul>
								</section>
							</a>
						</div>
					<?php } ?>
				<?php $p++; endwhile; wp_reset_postdata();?>
			</section>
			<?php if($posts_excess > 0): ?>
				<footer class="o-collection__footer">
					<a href="#" class="o-button s--big js-fetch-projects js-append" data-query="update" data-year="all" data-post-type="<?php echo $post_type; ?>">
						<span>more <?php echo $page_title; ?><i class="u-super" data-overflow="<?php echo $posts_excess ?>"><?php echo $posts_excess; ?></i></span>
					</a>
				</footer>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>