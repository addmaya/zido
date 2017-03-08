			<footer class="c-footer" id="talk">
				<div class="u-box">
					<div class="clear u-pd-075">
						<section class="u-half">
							<section class="c-contact__info">
								<span class="o-line"></span>
								<div class="clear">
									<h2 class="u-half">Contact</h2>
									<div class="u-half">
										<section>
											<p><?php the_field('pmt_address',14); ?></p>
											<a target="_blank" href="<?php the_field('pmt_map',14); ?>" class="u-link">Locate on Map</a>
										</section>
										<section>
											<ul class="o-list">
												<?php $pmt_telephones = get_field('pmt_phones',14); ?>
												<?php foreach ($pmt_telephones as $pmt_telephone): 
													$pmt_number = $pmt_telephone['pmt_phone_number'];
												?>
													<li><p>
														<a href="tel:<?php echo str_replace(' ', '', $pmt_number); ?>"><?php echo $pmt_number; ?></a>
													</p></li>
												<?php endforeach ?>
											</ul>
										</section>
										<section>
											<?php $pmt_email = get_field('pmt_email',14); ?>
											<p>
												<a href="mailto:<?php echo $pmt_email; ?>"><?php echo $pmt_email; ?></a>
											</p>
										</section>
										<section>
											<ul class="c-social">
												<?php $pmt_socials = get_field('pmt_social',14); ?>
												<?php foreach ($pmt_socials as $pmt_social): 
													$pmt_social_link = $pmt_social['pmt_link'];
													$pmt_social_icon = $pmt_social['pmt_icon'];
												?>
													<li><a target="_blank" href="<?php echo $pmt_social_link; ?>" class="o-icon__wrap"><span class="o-icon js-lazy" data-thumb="<?php echo $pmt_social_icon; ?>"></span></a></li>
												<?php endforeach ?>
											</ul>
										</section>
										
									</div>
								</div>
							</section>
						</section>
						<section class="u-half">
							<div class="u-pdl-075 c-form s--quote">
								<span class="o-line u-hide"></span>
								<h2>Request Costs</h2>
								<form id="form--quote" action="<?php echo get_admin_url();?>admin-post.php" method="post">
									<div class="u-hide">
										<input type="hidden" name="action" value="request_quote"/>
										<input type="text" name="form_spam_key"/>
										<?php wp_nonce_field('form_nonce_key','form_nonce');?>
									</div>

									<div class="o-input u-half">
										<input type="text" name="txt_name" placeholder="Your Name" required/>
										<span></span>
									</div>
									<div class="o-input u-half">
										<input type="email" name="txt_email" placeholder="E-mail" required/>
										<span></span>
									</div>
									<div class="o-input u-half">
										<input type="number" name="txt_telephone" placeholder="Telephone" required/>
										<span></span>
									</div>
									<div class="o-input u-half">
										<select name="slt_event" required>
											<option value="Wedding and Engagement">Wedding & Engagement</option>
											<option value="Wedding">Wedding</option>
											<option value="Engagement">Engagement</option>
											<option value="Other">Other</option>
										</select>
										<span></span>
									</div>
									<div class="o-submit u-half">
										<button>
											<span>Send</span>
										</button>
									</div>
								</form>
								<span class="c-form__status"></span>
							</div>
						</section>
					</div>
				</div>
			</footer>
		</div>
	</div>	
