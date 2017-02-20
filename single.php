<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$pjt_permalink = get_permalink();
	$pjt_sharelink = preg_replace('#^https?://#', '', $pjt_permalink);
	$pjt_cover = $pjt_thumb = get_post_thumb();
	$pjt_title = get_the_title();
	$pjt_date = time_ago();
	$pjt_posttype = get_post_type();
	$pjt_video = get_youtube_id(get_field('pt_video'));
	$pjt_brief = get_field('pmt_brief');
	$pjt_albums = get_field('pmt_album');
	$pjt_id = get_the_id();
?>
<header class="c-album__cover">
	<div class="u-box">
		<figure class="js-lazy" data-thumb="<?php echo $pjt_cover; ?>" data-aos="fade-up" data-aos-duration="1000">
			<?php if ($pjt_video): ?>
				<a href="#" class="js-video no-barba" data-video="<?php echo $pjt_video; ?>">
					<span class="o-icon s--video"></span>
				</a>
			<?php endif ?>
			<a href="#" class="o-icon__wrap js-share">
				<span class="o-icon s--sh"></span>
			</a>
			<ul class="c-social">
				<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--fb"></span></a></li>
				<li><a target="_blank" href="https://twitter.com/home?status=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--tw"></span></a></li>
				<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--gp"></span></a></li>
				<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $pjt_sharelink; ?>&media=<?php echo $pjt_cover; ?>&description=<?php echo $pjt_title; ?>" class="o-icon__wrap"><span class="o-icon s--pt"></span></a></li>
				<li><a target="_blank" href="mailto:?&subject=Check out this Project by Paramount Images" class="o-icon__wrap"><span class="o-icon s--ml"></span></a></li>
			</ul>
		</figure>
		<section>
			<div class="u-clear">
				<div class="u-half">
					<h1><?php echo $pjt_title; ?></h1>
					<ul class="o-meta">
						<li><?php echo $pjt_posttype; ?></li>
						<li><?php echo $pjt_date; ?></li>
					</ul>
					<span class="o-line"></span>
				</div>
				<?php if ($pjt_brief): ?>
					<div class="u-half">
					<section class="u-pdl-075">
						<p><?php echo $pjt_brief;?></p>
					</section>
				</div>
				<?php endif ?>
			</div>
		</section>
	</div>
</header>
<section class="c-album">
	<div class="u-box">
		<?php if ($pjt_albums): ?>
			<?php foreach ($pjt_albums as $pjt_album): ?>
				<div class="c-album__group">
					<h2><?php echo $pjt_album['pmt_album_title']; ?></h2>
					<div class="u-clear">
						<?php $photos = $pjt_album['pmt_album_gallery']; ?>
						<?php foreach ($photos as $photo):
							$photo_url = $photo['url'];
							$photo_thumb = $photo['sizes']['medium'];
							$photo_caption = $photo['caption'];
							$photo_width = $photo['width'];
							$photo_height = $photo['height'];
						?>
						<?php if ($photo_width > $photo_height){//landscape ?>
							<article class="u-full o-photo" data-aos="fade-up" data-aos-duration="1000">
								<section>
									<figure class="js-lazy" data-thumb="<?php echo $photo_url; ?>"></figure>
									<?php if ($photo_caption): ?>
										<div class="o-caption">
											<p><?php echo $photo_caption; ?></p>
										</div>
									<?php endif; ?>
								</section>
							</article>
						<?php } else {//portrait ?>
							<article class="u-half o-photo" data-aos="fade-up" data-aos-duration="1000">
								<section>
									<figure class="js-lazy" data-thumb="<?php echo $photo_url; ?>"></figure>
									<?php if ($photo_caption): ?>
										<div class="o-caption">
											<p><?php echo $photo_caption; ?></p>
										</div>
									<?php endif; ?>
								</section>
							</article>
						<?php } ?>
						<?php endforeach ?>
					</div>
				</div>
			<?php endforeach ?>
			<div class="u-clear">
				<div class="u-full c-share">
					<div class="c-share__wrap">
						<div class="u-half">
							<h4>Share</h4>
							<ul class="c-social s--inline">
								<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--fb"></span></a></li>
								<li><a target="_blank" href="https://twitter.com/home?status=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--tw"></span></a></li>
								<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--gp"></span></a></li>
								<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $pjt_sharelink; ?>&media=<?php echo $pjt_cover; ?>&description=<?php echo $pjt_title; ?>" class="o-icon__wrap"><span class="o-icon s--pt"></span></a></li>
								<li><a target="_blank" href="mailto:?&subject=Check out this Project by Paramount Images" class="o-icon__wrap"><span class="o-icon s--ml"></span></a></li>
							</ul>
							<?php $project_tags = get_the_tags(); if ($project_tags) {?>
							<section class="c-tags">
								<h4>Tagged</h4>
								<ul class="o-meta s--tags">
									<?php foreach ($project_tags as $project_tag): ?>
										<li><a href="<?php echo get_tag_link($project_tag->term_id); ?>"><?php  echo $project_tag->name; ?></a></li>
									<?php endforeach ?>					
								</ul>
							</section>
							<?php } ?>
						</div>
						<div class="u-half">
							<a href="<?php echo home_url(); ?>/weddings" class="o-button s--med js-show-contact">
								<span>Let's talk Business</span>
							</a>
						</div>
					</div>
					<div class="u-align-center">
						<span class="o-line"></span>
					</div>
				</div>
			</div>	
		<?php endif ?>
	</div>
</section>

<?php $link = get_field('pmt_link'); 
	if($link){ 
		$post = $link; 
		setup_postdata( $post );
?>
	<section style="padding:10em" class="u-clear">
		<h1>See the Engagement</h1>
		<div class="o-album u-full" data-aos="fade-up" data-aos-duration="800">
			<a href="<?php echo get_permalink(); ?>">
				<div class="o-spinner__wrap"><div class="o-spinner"></div></div>
				<div class="c-edges">
					<div class="o-edge s--tl"><span></span><span></span></div>
					<div class="o-edge s--tr"><span></span><span></span></div>
					<div class="o-edge s--bl"><span></span><span></span></div>
					<div class="o-edge s--br"><span></span><span></span></div>
				</div>
				<span class="o-line"></span>
				<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_post_thumb(); ?>"></figure>
				<section class="o-album__info">
					<h3><?php echo get_the_title(); ?></h3>
					<ul class="o-meta">
						<li><?php echo time_ago(); ?></li>
					</ul>
				</section>
			</a>
		</div>
	</section>
<?php wp_reset_postdata(); } 
	else {
		$reverse = new WP_Query(array('post_type'=>array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pmt_link', 'value'=>get_the_id(), 'compare'=> '='))));
		if ($reverse->have_posts()){
?>
		<?php while ($reverse->have_posts() ) : $reverse->the_post(); ?>
			<section style="padding:10em" class="u-clear">
				<h1>See the Wedding</h1>
				<div class="o-album u-full" data-aos="fade-up" data-aos-duration="800">
					<a href="<?php echo get_permalink(); ?>">
						<div class="o-spinner__wrap"><div class="o-spinner"></div></div>
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_post_thumb(); ?>"></figure>
						<section class="o-album__info">
							<h3><?php echo get_the_title(); ?></h3>
							<ul class="o-meta">
								<li><?php echo time_ago(); ?></li>
							</ul>
						</section>
					</a>
				</div>
			</section>
		<?php endwhile; wp_reset_postdata(); } ?>
<?php } ?>
<?php 
	$args = array('post_type'=>$pjt_posttype, 'post__not_in' => array($pjt_id), 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'0', 'compare'=> '!=')));
	$projects = new WQ_Query($args);
 ?>
<?php if ( $projects->have_posts() ) : ?>
<section class="c-suggest">
	<div class="u-box">
		<section class="u-clear u-mb-1em">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="o-album u-third">
					<a href="<?php the_permalink(); ?>">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-3.jpg"></figure>
						<section class="o-album__info">
							<h3><?php the_title(); ?></h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
							</ul>
						</section>
					</a>
				</div>
			<?php endwhile; ?>
		</section>
		<div class="u-align-center">
			<a href="<?php echo home_url(); ?>/weddings" class="o-button s--med">
				<span>More <i class="u-super">50</i></span>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>