<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$pjt_permalink = get_permalink();
	$pjt_sharelink = preg_replace('#^https?://#', '', $pjt_permalink);
	$pjt_cover = get_post_thumb();
	$pjt_cover_medium = get_post_thumb_medium();
	$pjt_title = get_the_title();
	$pjt_date = time_ago();
	$pjt_posttype = get_post_type();
	$pjt_video = get_youtube_id(get_field('pt_video'));
	$pjt_brief = get_field('pmt_brief');
	$pjt_albums = get_field('pmt_album');
	$pjt_id = get_the_id();
	$pjt_credits = get_field('pt_credits');
?>
<header class="c-album__cover">
	<div class="u-box">
		<figure class="js-lazy" data-thumb="<?php echo $pjt_cover; ?>" data-thumb-medium="<?php echo $pjt_cover_medium; ?>" data-aos="fade-up" data-aos-duration="1000">
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
		<section data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
			<div class="clear">
				<div class="u-half">
					<h1><?php echo str_replace('and', '<span>&</span>', $pjt_title); ?></h1>
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
					<div class="clear">
						<?php 
							$photos = $pjt_album['pmt_album_gallery'];
							$landscapes = array();
							$portraits = array();
						?>
						<?php foreach ($photos as $photo):
							$photo_width = $photo['width'];
							$photo_height = $photo['height'];

							if ($photo_width > $photo_height){
								array_push($landscapes, $photo);
							}
							else{
								array_push($portraits, $photo);
							}
						?>
						<?php endforeach ?>
						
						<?php 
							$l=1; 
							$landscapes_count = count($landscapes);
							foreach ($landscapes as $photo): 
							$photo_url = $photo['url'];
							$photo_thumb = $photo['sizes']['large'];
							$photo_caption = $photo['caption'];
							if($landscapes_count > 5){
								if($l > 5){
									$l = 1;
								}
							}
						?>
							<article class="u-full o-photo <?php if(($l == 4) || ($l == 5)){echo 's--square';} ?>" data-aos="fade-up" data-aos-duration="700">
								<section>
									<div class="o-spinner__wrap"><div class="o-spinner"></div></div>
									<figure class="js-lazy" data-thumb="<?php echo $photo_url; ?>" data-thumb-medium="<?php echo $photo_thumb; ?>"></figure>
									<?php if ($photo_caption): ?>
										<div class="o-caption">
											<p><?php echo $photo_caption; ?></p>
										</div>
									<?php endif; ?>
								</section>
							</article>
						<?php $l++; endforeach ?>

						<?php 
							$p=1; 
							$portraits_count = count($portraits);
							foreach ($portraits as $photo): 
							$photo_url = $photo['url'];
							$photo_thumb = $photo['sizes']['large'];
							$photo_caption = $photo['caption'];
						?>
							<article class="u-half o-photo" data-aos="fade-up" data-aos-duration="700">
								<section>
									<div class="o-spinner__wrap"><div class="o-spinner"></div></div>
									<figure class="js-lazy" data-thumb="<?php echo $photo_url; ?>" data-thumb-medium="<?php echo $photo_thumb; ?>"></figure>
									<?php if ($photo_caption): ?>
										<div class="o-caption">
											<p><?php echo $photo_caption; ?></p>
										</div>
									<?php endif; ?>
								</section>
							</article>
						<?php $p++; endforeach ?>

					</div>
				</div>
			<?php endforeach ?>
			<div class="clear">
				<div class="u-full c-share">
					<div class="c-share__wrap">
						<div class="u-half">
							
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
							<?php if ($pjt_credits): ?>
								<section class="c-credits__wrap">
									<h4>Credits</h4>
									<ul class="c-credits">
										<?php foreach ($pjt_credits as $credit):
											$credit_name = $credit['credit_name'];
											$credit_role = $credit['credit_role'];
											$credit_website = $credit['credit_website'];
										?>
											<?php if ($credit_name && $credit_role): ?>
												<li><a target="_blank" <?php if($credit_website){echo 'href="'.$credit_website.'"';} ?>><?php echo $credit_role; ?> - <?php echo $credit_name; ?></a></li>
											<?php endif ?>	
										<?php endforeach ?>
									</ul>
								</section>
							<?php endif ?>
						</div>
						<div class="u-half">
							<section class="c-album__share">
								<h4>Share</h4>
								<ul class="c-social s--inline">
									<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--fb"></span></a></li>
									<li><a target="_blank" href="https://twitter.com/home?status=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--tw"></span></a></li>
									<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--gp"></span></a></li>
									<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $pjt_sharelink; ?>&media=<?php echo $pjt_cover; ?>&description=<?php echo $pjt_title; ?>" class="o-icon__wrap"><span class="o-icon s--pt"></span></a></li>
									<li><a target="_blank" href="mailto:?&subject=Check out this Project by Paramount Images&body=<?php echo $pjt_sharelink; ?>" class="o-icon__wrap"><span class="o-icon s--ml"></span></a></li>
								</ul>
							</section>
							<a href="#talk" class="o-button s--med s--call">
								<span>Let's talk Business</span>
							</a>
						</div>
					</div>
				</div>
			</div>	
		<?php endif ?>
	</div>
</section>
<?php $link = get_field('pt_link');  if($link){ ?>
	<?php foreach ($link as $post): ?>
	<?php setup_postdata($post); ?>
	<section class="c-album__link">
		<div class="u-box">
			<h2>See the Engagement</h2>
			<div class="o-album u-full" data-aos="fade-up" data-aos-duration="800">
				<a data-target="engagement" href="<?php echo get_permalink(); ?>">
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
						<h3><?php echo str_replace('and', '<span>&</span>', get_the_title()); ?></h3>
						<ul class="o-meta">
							<li><?php echo time_ago(); ?></li>
						</ul>
					</section>
				</a>
			</div>
		</div>
	</section>
	<?php endforeach ?>
<?php wp_reset_postdata(); } 
	else {
		$reverse = new WP_Query(array('post_type'=>array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pt_link', 'value'=>'"' . get_the_ID() . '"', 'compare'=> 'LIKE'))));
		if ($reverse->have_posts()){
?>
		<?php while ($reverse->have_posts() ) : $reverse->the_post(); ?>
			<section class="c-album__link"> 
				<div class="u-box clear">
					<h2>See the Wedding</h2>
					<div class="o-album u-full" data-aos="fade-up" data-aos-duration="800">
						<a data-target="wedding" href="<?php echo get_permalink(); ?>">
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
								<h3><?php echo str_replace('and', '<span>&</span>', get_the_title()); ?></h3>
								<ul class="o-meta">
									<li><?php echo time_ago(); ?></li>
								</ul>
							</section>
						</a>
					</div>
				</div>
			</section>
		<?php endwhile; wp_reset_postdata(); } ?>
<?php } ?>

<?php 
	$projects = new WP_Query(array('orderby'=>'rand', 'posts_per_page'=>3, 'post__not_in' => array($pjt_id), 'post_type'=>$post_type, 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'0', 'compare'=> '!='))));
 ?>
 <?php if ( $projects->have_posts() ) : ?>
 <section class="c-suggest">
 	<div class="u-box">
 		<section class="clear u-mb-1em">
 			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
 				<div class="o-album u-third">
 					<a href="<?php the_permalink(); ?>">
 						<div class="c-edges">
 							<div class="o-edge s--tl"><span></span><span></span></div>
 							<div class="o-edge s--tr"><span></span><span></span></div>
 							<div class="o-edge s--bl"><span></span><span></span></div>
 							<div class="o-edge s--br"><span></span><span></span></div>
 						</div>
 						<span class="o-line"></span>
 						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_post_thumb(); ?>"></figure>
 						<section class="o-album__info">
 							<h3><?php echo str_replace('and', '<span>&</span>', get_the_title()); ?></h3>
 							<ul class="o-meta">
 								<li><?php echo time_ago(); ?></li>
 							</ul>
 						</section>
 					</a>
 				</div>
 			<?php endwhile; ?>
 			<?php wp_reset_postdata(); ?>
 		</section>
 		<div class="u-align-center">
 			<?php if ($pjt_posttype == 'wedding'): ?>
 				<a href="<?php echo home_url(); ?>/weddings" class="o-button s--med">
 					<span>More Weddings</span>
 				</a>
 			<?php endif ?>
 			<?php if ($pjt_posttype == 'engagement'): ?>
 				<a href="<?php echo home_url(); ?>/engagements" class="o-button s--med">
 					<span>More Engagements</span>
 				</a>
 			<?php endif ?>
 		</div>
 	</div>
 </section>
 <?php endif; ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>