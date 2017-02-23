<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	$category_id = get_queried_object()->term_id;
	$category_count = get_category_count($category_id);
	$posts_per_page = get_option('posts_per_page');
	$category_balance = $category_count - $posts_per_page;
?>
<section>
	<div class="u-box">
		<header class="o-header">
			<section>
				<h1>Tag: <?php echo single_tag_title( '', false ); ?><span class="u-super"><?php echo $category_count; ?></span></h1>
			</section>
		</header>
		<div class="o-collection">
			<header>
				<?php Starkers_Utilities::get_template_parts (array('parts/shared/filter')); ?>
			</header>
			<section class="u-clear o-collection__list">
				<?php $p = 1; ?>
				<?php while (have_posts()):the_post();
					$pjt_title = get_the_title();
					$pjt_thumb = get_post_thumb();
					$pjt_link = get_permalink();
					$pjt_date = time_ago();
					$pjt_cats = get_the_category();
					$pjt_video = get_youtube_id(get_field('pt_video'));
					if($p > 8){$p = 1;}
				?>
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
				<?php $p++; endwhile; wp_reset_postdata();?>
			</section>

			<?php if($category_count > $posts_per_page): ?>
				<footer class="o-collection__footer">
					<a href="#" class="o-button s--big js-fetch-projects js-append" data-post-type="all" data-query="update" data-year="all" data-tag="<?php echo $category_id; ?>">
						<span>more <?php echo $category_name; ?><i class="u-super" data-category-balance="<?php echo $category_balance ?>"><?php echo $category_balance; ?></i></span>
					</a>
				</footer>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>