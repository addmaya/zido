<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="u-canvas">
	<div class="u-box u-height">
		<div class="c-profile">
			<div class="u-table">
				<div class="u-cell">
					<figure class="js-lazy u-bkg-img" data-thumb="<?php echo get_post_thumb();?>"></figure>
					<section class="u-half s--right">
						<h1><?php the_field('pmt_sct_heading'); ?></h1>
						<p><?php the_field('pmt_sct_brief'); ?></p>
						<a href="#" class="o-button"><span>See the Team</span></a>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="u-bkg-grey">
	<div class="u-box">
		<div class="c-team">
			<div class="clear">
				<?php 
					$staff = new WP_Query(array('posts_per_page'=>-1, 'post_type'=>'staff'));
					$col1 = '';
					$col2 = '';
				?>
				<?php  if ($staff->have_posts()){ ?>
					<?php $i = 0; while ($staff->have_posts()) : $staff->the_post();?>
						<?php
							$staff_name = get_the_title();
							$staff_photo = get_field('stf_cover');
							$staff_title = get_field('stf_role');

							if($i % 2 === 0){
								$col1 .= '<article class="o-staff" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300"><a href="#"><figure class="js-lazy" data-thumb="'.$staff_photo.'"></figure></a><section><h2>'.$staff_name.'</h2><span>'.$staff_title.'</span></section></article>';
							}
							else {
								$col2 .= '<article class="o-staff" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300"><a href="#"><figure class="js-lazy" data-thumb="'.$staff_photo.'"></figure></a><section><h2>'.$staff_name.'</h2><span>'.$staff_title.'</span></section></article>';
							}
						?>
					<?php $i++; endwhile; wp_reset_postdata(); ?>
				<?php }?>
				<div class="u-half"><?php echo $col1; ?></div>
				<div class="u-half"><?php echo $col2; ?></div>
			</div>
		</div>
	</div>
</section>
<?php $bts_gallery = get_field('pmt_bts'); ?>
<?php if ($bts_gallery): ?>
	<section>
		<div class="c-grid__moments">
			<?php foreach ($bts_gallery as $image): ?>
				<div class="o-moment js-lazy" data-thumb="<?php echo $image['sizes']['large']; ?>"></div>
			<?php endforeach ?>
		</div>
	</section>
<?php endif ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>