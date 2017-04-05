	<div class="c-search">
		<div class="u-box">
			<section>
				<input id="search" class="c-search__input" type="text" name="s" placeholder="Enter Name" autofocus/>
				<a class="o-button-round s--close" href="#">
					<span class="o-icon s--close"></span>
				</a>
			</section>
		</div>
	</div>
	<div class="c-pop">
		<div class="u-table">
			<div class="u-cell">
				<div class="c-pop__box">
					<a href="#" class="o-icon__wrap js-close-pop">
						<span class="o-icon s--close"></span>
					</a>
					<div class="u-canvas u-hide"></div>
					<div class="c-contact u-hide">
						<div class="c-contact__wrap">
							<section class="c-contact__form c-form">
								<form action="<?php echo get_admin_url();?>admin-post.php" method="post">
									<div class="u-hide">
										<input type="hidden" name="action" value="request_quote"/>
										<input type="text" name="form_spam_key"/>
										<?php wp_nonce_field('form_nonce_key','form_nonce');?>
									</div>

									<div class="o-input">
										<input type="text" name="userName" placeholder="Your Name"/>
										<span></span>
									</div>
									<div class="o-input">
										<input type="email" name="userEmail" placeholder="E-mail"/>
										<span></span>
									</div>
									<div class="o-input">
										<input type="number" name="userTelephone" placeholder="Telephone"/>
										<span></span>
									</div>
									<div class="o-input">
										<textarea placeholder="Your Comment / Message" name="userMessage" rows="10"></textarea>
									</div>
									<div class="o-submit">
										<button>
											<span>Send</span>
										</button>
									</div>
								</form>
								<span class="c-form__status"></span>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="#" class="o-icon__wrap c-chat js-show-contact">
		<span class="o-icon s--cht"></span>
		<div class="c-msg__btn"><span>Talk to Us</span></div>
	</a>
	<div class="c-edges">
		<div class="c-loader"></div>
		<div class="o-edge s--tl"><span></span><span></span></div>
		<div class="o-edge s--tr"><span></span><span></span></div>
		<div class="o-edge s--bl"><span></span><span></span></div>
		<div class="o-edge s--br"><span></span><span></span></div>
	</div>
	<div class="c-frame__left">
		<section>
			<p>&copy; <?php echo date("Y"); ?> Paramount Images Studio.</p>
		</section>
		<section>
			<p>ISO 142 - lens48mm - AP2.2 AWB</p>
		</section>
	</div>
	<div class="c-frame__right">
		<ul class="c-social">
			<?php $pmt_socials = get_field('pmt_social',14); ?>
			<?php foreach ($pmt_socials as $pmt_social): 
				$pmt_social_link = $pmt_social['pmt_link'];
				$pmt_social_icon = $pmt_social['pmt_icon'];
			?>
				<li><a target="_blank" href="<?php echo $pmt_social_link; ?>" class="o-icon__wrap"><span class="o-icon js-lazy" data-thumb="<?php echo $pmt_social_icon; ?>"></span></a></li>
			<?php endforeach ?>
		</ul>
		<ul class="o-list s--inline s--frame">
			<li><?php $pmt_p = get_field('pmt_phones',14); $pmt_p_number = $pmt_p[0]['pmt_phone_number']; ?><a href="tel:<?php echo str_replace(' ', '', $pmt_p_number); ?>"><?php echo $pmt_p_number; ?></a></li>
<!-- 			<li><?php $pmt_e = get_field('pmt_email',14); ?><a href="mailto:<?php echo $pmt_e; ?>"><?php echo $pmt_e; ?></a></li> -->
		</ul>
<!-- 		<a href="#" class="o-icon__wrap c-top js-top" title="Back to Top"><span class="o-icon s--tp"></span></a>
 -->	</div>
	<section class="c-header">
		<div class="u-box">
			<a href="<?php echo home_url();?>" class="c-logo"></a>
			<a href="#" class="c-menu__toggle">
				<div>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</a>
			<a href="#" class="c-search__toggle js-show-search">
				<span class="o-icon s--search"></span>
			</a>
			<nav class="c-menu">
				<ul>
					<li class="js-wedding c-menu__item <?php if(is_page('weddings')){echo 'is-active';} ?>"><a href="<?php echo home_url();?>/wedding-photography">
						<span>Wedding</span></a>
					</li>
					<li class="js-engagement c-menu__item <?php if(is_page('engagements')){echo 'is-active';} ?>"><a href="<?php echo home_url();?>/engagement-photography"><span>Engagement</span></a></li>
					<li class="js-videos c-menu__item <?php if(is_page('video')){echo 'is-active';} ?>"><a href="<?php echo home_url();?>/video"><span>Video</span></a></li>
					<!-- <li class="js-team c-menu__item <?php if(is_page('team')){echo 'is-active';} ?>"><a href="<?php echo home_url();?>/team"><span>Team</span></a></li> -->
					<li class="c-menu__item"><a href="#talk"><span>Contact</span></a></li>
					<li class="c-menu__item"><a href="#" class="js-show-search"><span>Search</span></a></li>
				</ul>
			</nav>
		</div>
	</section>
	<div class="c-pattern"></div>
	<div id="barba-wrapper">
		<div class="barba-container" data-namespace="<?php
			if(is_front_page()){echo 'home';}
			if(is_page('wedding-photography')){echo 'weddings';}
			if(is_page('engagement-photography')){echo 'engagements';}
			if(is_page('video')){echo 'video';}
			if(is_page('team')){echo 'team';}
			if(is_tag()) {echo 'archive'; }
			if(is_singular(array('wedding', 'engagement'))) {echo 'single'; }
		?>">
		<div class="c-tint"></div>

