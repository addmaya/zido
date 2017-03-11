<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$slogan = get_field('pmt_sct_heading');
	$profile = get_field('pmt_sct_brief');
?>
<?php $slides = new WP_Query(array('posts_per_page'=>5, 'post_type'=>'slide')); if ($slides->have_posts()): ?>
	<section class="u-box c-slider">
		<div class="swiper-container c-slides">
			<div class="swiper-wrapper">
				<?php $s=0; while ( $slides->have_posts() ) : $slides->the_post();
					$slide_title = get_the_title();
					$slide_thumb = get_field('pmt_slide_image');
					$button_txt = get_field('pmt_slide_cta_text');
					$button_link = get_field('pmt_slide_link');
				?>
				<div class="swiper-slide scene" <?php if($s < 1){echo 'data-swiper-autoplay="8000"';} ?>>
					<a href="<?php if($button_link){echo $button_link;} else{echo '#talk';} ?>" class="c-slide layer" data-thumb="<?php echo $slide_thumb['sizes']['large']; ?>" data-depth="0.20">
						<div class="c-slide__copy layer" data-depth="0.40">
							<section>
								<h1><?php echo $slide_title; ?></h1>
								<?php if ($s == 0): ?>
									<img src="<?php echo $slide_thumb['sizes']['large']; ?>" class="u-hide" />
								<?php endif ?>
								<div class="c-slide__button">
									<span class="c-slide__button__title"><?php echo $button_txt; ?></span>
									<div class="c-edges">
										<div class="o-edge s--tl"><span></span><span></span></div>
										<div class="o-edge s--tr"><span></span><span></span></div>
										<div class="o-edge s--bl"><span></span><span></span></div>
										<div class="o-edge s--br"><span></span><span></span></div>
									</div>
								</div>
							</section>
						</div>
					</a>
				</div>
				<?php $s++; endwhile; wp_reset_postdata();?>
			</div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</section>
<?php endif; ?>
<section>
	<div class="u-box">
		<?php if ($slogan && $profile): ?>
			<header class="o-header s--reset">
				<section>
					<h2><?php echo $slogan; ?></h2>
				</section>
				<section>
					<div class="u-wrap">
						<p><?php echo $profile; ?></p>
						<span class="o-line"></span>
					</div>
				</section>
			</header>
		<?php endif ?>
		
		<?php $projects = new WP_Query(array('post_type'=>array('wedding', 'engagement'), 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'0', 'compare'=> '!=')))); if ($projects->have_posts()): ?>
		<div class="o-collection">
			<header>
				<?php $latest = new WP_Query(array('posts_per_page'=>1, 'post_type'=>array('wedding', 'engagement'))); ?>
				<?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
					<span>Lastest Work. Updated: <?php echo time_ago(); ?></span>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</header>
			<section class="clear">
				<?php $p = 1; $d=0; ?>
				<?php while ($projects->have_posts() ) : $projects->the_post();
					$pjt_title = str_replace('and', '<span>&</span>', get_the_title());
					$pjt_thumb = get_post_thumb();
					$pjt_thumb_medium = get_post_thumb_medium();
					$pjt_link = get_permalink();
					$pjt_date = time_ago();
					$pjt_posttype = get_post_type();
					if($p > 8){$p = 1;}
				?>
					<div data-index="<?php echo $p; ?>" class="o-album <?php if(($p == 3) || ($p == 8)){echo 'u-full';} else{echo 'u-half';} ?>" data-aos="fade-up">
						<a data-target="<?php echo get_post_type(); ?>" href="<?php echo $pjt_link; ?>">
							<div class="o-spinner__wrap"><div class="o-spinner"></div></div>
							<div class="c-edges">
								<div class="o-edge s--tl"><span></span><span></span></div>
								<div class="o-edge s--tr"><span></span><span></span></div>
								<div class="o-edge s--bl"><span></span><span></span></div>
								<div class="o-edge s--br"><span></span><span></span></div>
							</div>
							<span class="o-line"></span>
							<?php if ($d < 1): ?>
								<img src="<?php echo $pjt_thumb; ?> " class="u-hide"/>
							<?php endif ?>
							<figure class="o-album__cover js-lazy" data-thumb-medium="<?php echo $pjt_thumb_medium; ?>" data-thumb="<?php echo $pjt_thumb; ?>"></figure>
							<section class="o-album__info">
								<h3><?php echo $pjt_title; ?></h3>
								<ul class="o-meta">
									<li><?php echo $pjt_date; ?></li>
									<li><?php echo $pjt_posttype; ?></li>
								</ul>
							</section>
						</a>
					</div>
				<?php $p++; $d++; endwhile; wp_reset_postdata();?>
			</section>
			<footer>
				<?php 
					$weddings = new WP_Query(array('posts_per_page'=>-1, 'post_type'=>'wedding', 'meta_query'=> array(array('key'=>'pmt_album', 'value'=>'0', 'compare'=> '!=')))); 
					$weddings_count = $weddings->post_count;
				?>
				<a href="<?php echo home_url(); ?>/wedding-photography" class="o-button s--big">
					<span>weddings <i class="u-super"><?php echo $weddings_count; ?></i></span>
				</a>
				<a href="<?php echo home_url(); ?>/engagement-photography" class="o-button s--big">
					<span>engagements <i class="u-super"><?php echo wp_count_posts('engagement')->publish; ?></i></span>
				</a>
			</footer>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>