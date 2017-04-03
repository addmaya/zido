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
						<div class="c-form s--quote">
							<span class="o-line u-hide"></span>
							<h2>Request Costs</h2>
							<form id="form--quote" action="<?php echo get_admin_url();?>admin-post.php" method="post">
								<div class="u-hide">
									<input type="hidden" name="action" value="request_quote"/>
									<input type="text" name="form_spam_key"/>
									<?php wp_nonce_field('form_nonce_key','form_nonce');?>
								</div>
								<div class="clear">
									<div class="o-input u-half">
										<input type="text" name="userName" placeholder="Your Name" required/>
									</div>
									<div class="o-input u-half">
										<input type="email" name="userEmail" placeholder="E-mail" required/>
									</div>
									<div class="o-input u-half">
										<input type="number" name="userTelephone" placeholder="Telephone" required/>
									</div>
									<div class="o-input u-half">
										<select id="userEvent" name="userEvent" required>
											<option disabled selected value="">Select Event</option>
											<option value="1">Wedding</option>
											<option value="2">Engagement</option>
											<option value="3">Other</option>
										</select>
									</div>
								</div>
								<div id="c-wedding" class="c-form-group u-hide clear">
									<p>We deliver top quality photography and video productions built around your story. Enter your wedding preferences below.</p>
									<fieldset>
										<div class="o-input u-half">
											<label for="weddingDate">Wedding Date</label>
											<input type="text" id="weddingDate" name="weddingDate"/>
										</div>
										<div class="o-input u-half">
											<label for="weddingLocation">Venue</label>
											<input type="text" id="weddingLocation" name="weddingLocation"/>
										</div>
									</fieldset>
									<div class="clear">
										<fieldset class="u-half">
											<legend>Photography</legend>
											<div class="o-input s--inline">
												<input type="number" id="photoBookCount" name="photoBookCount" />
												<label for="photoBookCount">No. Albums</label>	
											</div>
											<div class="o-input s--inline">
												<select name="albumCount" id="albumCount">
													<option disabled selected value="">-</option>
													<option value="150">150</option>
													<option value="200">200</option>
													<option value="300">300</option>
													<option value="400">400</option>
													<option value="other">Other</option>
												</select>
												<label for="albumCount">Photos in Album</label>
											</div>
											<div id="otherCount" class="o-input" style="display:none">
												<label for="otherAlbumCount">Specify No. of Photos</label>
												<input type="number" id="otherAlbumCount" name="otherAlbumCount"/>
											</div>
											<div class="o-input s--inline">
												<input type="number" id="photographersCount" name="photographersCount" />
												<label for="photographersCount">Photographers</label>
											</div>
										</fieldset>
										<fieldset class="u-half">
											<legend>Video</legend>
											<div class="o-input s--inline">
												<select name="videoLength" id="videoLength">
													<option disabled selected value="">-</option>
													<option value="5min">5 min</option>
													<option value="15min">15 min</option>
													<option value="30min">30 min</option>
													<option value="45min">45 min</option>
													<option value="1h">1h</option>
													<option value="2h">2h</option>
													<option value="4h">4h</option>
													<option value="6h">6h</option>
												</select>
												<label for="videoLength">Video Length</label>
											</div>
											<div class="o-input s--inline">			
												<select name="recordingHours" id="recordingHours">
													<option disabled selected value="">-</option>
													<option value="2h">2h</option>
													<option value="4h">4h</option>
													<option value="6h">6h</option>
													<option value="8h">8h</option>
													<option value="10h">10h</option>
													<option value="24h">24h</option>
													<option value="Unlimited">Unlimited</option>
												</select>
												<label for="recordingHours">Hours of Recording</label>
											</div>
											<div class="o-input s--inline">
												<input type="number" id="cameramenCount" name="cameramenCount"/>
												<label for="cameramenCount">Cameramen</label>
											</div>
										</fieldset>
									</div>
									<fieldset>
										<legend>Extras</legend>
										<div class="o-check">
											<input type="checkbox" id="softCopy" name="softCopy" value="1">
											<label for="softCopy">Soft Copy Photos</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="photoBooth" name="photoBooth" value="1">
											<label for="photoBooth">Photo Booth</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="memoryLane" name="memoryLane" value="1">
											<label for="memoryLane">Memory Lane</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="engagementShoot" name="engagementShoot" value="1">
											<label for="engagementShoot">Engagement Shoot</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="postWeddingShoot" name="postWeddingShoot" value="1">
											<label for="postWeddingShoot">Post Wedding Shoot</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="weddingBanner" name="weddingBanner" value="1">
											<label for="weddingBanner">Wedding Banner</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="bridalShower" name="bridalShower" value="1">
											<label for="bridalShower">Bridal Shower</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="bacheloretteParty" name="bacheloretteParty" value="1">
											<label for="bacheloretteParty">Bachelorette Party</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="bachelorParty" name="bachelorParty" value="1">
											<label for="bachelorParty">Bachelor Party</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="kasuzekatya" name="kasuzekatya" value="1">
											<label for="kasuzekatya">Kaasuzekatya</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="sameDay" name="sameDay" value="1">
											<label for="sameDay">Same Day Video Edit</label>
										</div>
										<div class="o-input s--inline">
											<input type="number" id="projectorCount" name="projectorCount"/>
											<label for="projectorCount">No. Projectors</label>
										</div>
										<div class="o-input s--inline">
											<input type="number" id="plasmaCount" name="plasmaCount"/>
											<label for="plasmaCount">Plasma Screens</label>
										</div>
										<div class="o-input s--inline">
											<input type="number" id="ledCount" name="ledCount"/>
											<label for="ledCount">LED Screens</label>
										</div>
										<div class="o-input s--inline">
											<input type="number" id="guestBookCount" name="guestBookCount"/>
											<label for="guestBookCount">Guest Books</label>
										</div>
										<div class="o-input s--inline">
											<input type="number" id="signingPhotoCount" name="signingPhotoCount"/>
											<label for="signingPhotoCount">Signing Photos</label>
										</div>
										<div class="o-input s--inline">
											<input type="number" id="boardsCount" name="boardsCount"/>
											<label for="boardsCount">Wall Hangings</label>
										</div>
									</fieldset>
									<fieldset>
										<legend>Comment</legend>
										<div class="o-input">
											<textarea name="weddingComment" id="weddingComment" rows="5"></textarea>
										</div>
									</fieldset>
								</div>
								<div id="c-engagement" class="u-hide c-form-group">
									<p>Our engagement photography will amaze you. We select the best location for your story but your free to tell us your preference.</p>
									<fieldset>
										<div class="o-input u-half">
											<label for="engagementDate">Shoot Date</label>
											<input type="text" id="engagementDate" name="engagementDate"/>
										</div>
										<div class="o-input u-half">
											<label for="engagementLocation">Venue</label>
											<input type="text" id="engagementLocation" name="engagementLocation"/>
										</div>
									</fieldset>
									<fieldset>
										<div class="o-input s--inline">			
											<select name="shootHours" id="shootHours">
												<option disabled selected value="">-</option>
												<option value="1h">1h</option>
												<option value="3h">3h</option>
												<option value="6h">6h</option>
												<option value="9h">9h</option>
												<option value="12h">12h</option>
												<option value="24h">24h</option>
												<option value="Unlimited">Unlimited</option>
											</select>
											<label for="shootHours">Hours of Shooting</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="engagementSoftCopy" name="engagementSoftCopy" value="1">
											<label for="engagementSoftCopy">Soft Copy Photos</label>
										</div>
										<div class="o-check">
											<input type="checkbox" id="engagementVideo" name="engagementVideo" value="1">
											<label for="engagementVideo">Album</label>
										</div>
										
									</fieldset>
									<fieldset>
										<legend>Comment</legend>
										<div class="o-input">
											<textarea name="engagementComment" id="engagementComment" rows="5"></textarea>
										</div>
									</fieldset>
								</div>
								<div id="c-other" class="u-hide c-form-group">
									<fieldset>
										<legend>Enter details about event</legend>
										<div class="o-input">
											<textarea name="otherComment" id="otherComment" rows="5"></textarea>
										</div>
									</fieldset>
								</div>
								<div class="o-submit u-half">
									<button>
										<span>Send</span>
									</button>
								</div>
							</form>
							<span class="c-form__status"></span>
						</div>
						<div class="c-subscribe">
							<h2>Get Updates</h2>
							<form action="//paramount.us15.list-manage.com/subscribe/post?u=22803013887746a6b605f7cc8&amp;id=f6da169156" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
								<div class="o-input">
									<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Your Email Address" required>
								</div>
							    <div class="u-hide" aria-hidden="true"><input type="text" name="b_22803013887746a6b605f7cc8_f6da169156" tabindex="-1" value=""></div>
							    <div class="o-submit u-half">
							    	<button>
							    		<span>Subscribe</span>
							    	</button>
							    </div>
							</form>
						</div>
					</section>
				</div>
			</div>
		</footer>
	</div>
</div>