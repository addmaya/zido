<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$slides = new WP_Query(array('posts_per_page'=>5, 'post_type'=>'slide'));
	$slogan = get_field('pmt_sct_heading');
	$profile = get_field('pmt_sct_brief');
	$projects = new WP_Query(array('posts_per_page'=>10, 'post_type'=>'project'));
?>
<?php if ($slides->have_posts()): ?>
	<section class="u-box c-slider">
		<div class="swiper-container c-slides">
			<div class="swiper-wrapper">
				<?php while ( $slides->have_posts() ) : $slides->the_post();
					$slide_title = get_the_title();
					$slide_thumb = get_field('pmt_slide_image');
					$button_txt = get_field('pmt_slide_cta_text');
					$button_link = get_field('pmt_slide_link');
				?>
				<div class="swiper-slide scene">
					<a href="<?php echo $button_link; ?>" class="c-slide js-lazy layer" data-thumb="<?php echo $slide_thumb; ?>" data-depth="0.20">
						<div class="c-slide__copy layer" data-depth="0.40">
							<section>
								<h1><?php echo $slide_title; ?></h1>
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
				<?php endwhile; wp_reset_postdata();?>
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
		<?php if ($slides->have_posts()): ?>
		<div class="o-collection">
			<header>
				<span>Updated: 2 days ago</span>
			</header>
			<section class="u-clear">
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-3.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-4.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-full" data-aos="fade-up" data-aos-duration="800">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-5x.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-6.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-7.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-8.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-9.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-full" data-aos="fade-up" data-aos-duration="800">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-10.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-1.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
				<div class="o-album u-half" data-aos="fade-up" data-aos-duration="800">
					<a href="<?php echo home_url();?>/project/bravo-cream">
						<div class="c-edges">
							<div class="o-edge s--tl"><span></span><span></span></div>
							<div class="o-edge s--tr"><span></span><span></span></div>
							<div class="o-edge s--bl"><span></span><span></span></div>
							<div class="o-edge s--br"><span></span><span></span></div>
						</div>
						<span class="o-line"></span>
						<figure class="o-album__cover js-lazy" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy/dummy-2.jpg"></figure>
						<section class="o-album__info">
							<h3>Hassan & Nancy</h3>
							<ul class="o-meta">
								<li>28 January 2016</li>
								<li>Engagement</li>
								<li>Mabira Forest</li>
							</ul>
						</section>
					</a>
				</div>
			</section>
			<footer>
				<a href="#" class="o-button s--big">
					<span>weddings <i class="u-super">50</i></span>
				</a>
				<a href="#" class="o-button s--big">
					<span>engagements <i class="u-super">120</i></span>
				</a>
			</footer>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>