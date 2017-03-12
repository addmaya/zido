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
											<input type="text" name="txt_name" placeholder="Your Name" required/>
										</div>
										<div class="o-input u-half">
											<input type="email" name="txt_email" placeholder="E-mail" required/>
										</div>
										<div class="o-input u-half">
											<input type="number" name="txt_telephone" placeholder="Telephone" required/>
										</div>
										<div class="o-input u-half">
											<select id="eventOption" name="eventOption" required>
												<option disabled selected value="">Select Event</option>
												<option value="1">Wedding</option>
												<option value="2">Engagement</option>
												<option value="3">Other</option>
											</select>
										</div>
									</div>
									<div id="c-wedding" class="c-form-group u-hide clear">
										<h3>Wedding</h3>
										<fieldset>
											<div class="o-input u-half">
												<label for="weddingDate">Date</label>
												<input type="text" id="weddingDate" name="weddingDate"/>
											</div>
											<div class="o-input u-half">
												<label for="weddingLocation">Location</label>
												<input type="text" id="weddingLocation" name="weddingLocation"/>
											</div>
										</fieldset>
										<div class="clear">
											<fieldset class="u-half">
												<legend>Video</legend>
												<div class="o-input s--inline">
													<input type="text" id="cameramenCount" name="cameramenCount"/>
													<label for="cameramenCount">Camera Men</label>
												</div>
												<div class="o-input s--inline">
													<input type="text" id="projectorCount" name="projectorCount"/>
													<label for="projectorCount">Projectors</label>
												</div>
												<div class="o-input s--inline">
													<input type="text" id="plasmaCount" name="plasmaCount"/>
													<label for="plasmaCount">Plasma Screens</label>
												</div>
												<div class="o-input s--inline">
													<input type="text" id="ledCount" name="ledCount"/>
													<label for="ledCount">LED Screens</label>
												</div>
												<div class="o-input s--inline">
													<select name="recordingHours" id="recordingHours">
														<option disabled selected>-</option>
														<option value="0">24h</option>
														<option value="1">10h</option>
														<option value="2">8h</option>
														<option value="3">6h</option>
													</select>
													<label for="recordingHours">Recording Hours</label>
												</div>
												<div class="o-input s--inline">
													<select name="videoLength" id="videoLength">
														<option disabled selected>-</option>
														<option value="0">1h</option>
														<option value="1">2h</option>
														<option value="2">4h</option>
														<option value="3">6h</option>
													</select>
													<label for="videoLength">Video Length</label>
												</div>
											</fieldset>
											<fieldset class="u-half">
												<legend>Photography</legend>
												<div class="o-input s--inline">
													<input type="number" id="photographersCount" name="photographersCount" />
													<label for="photographersCount">Photographers</label>
												</div>
												<div class="o-input s--inline">
													<input type="number" id="photoBookCount" name="photoBookCount" />
													<label for="photoBookCount">Photo Book (A3, 25 sheets)</label>
													
												</div>
												<div class="o-input s--inline">
													<input type="number" id="guestBookCount" name="guestBookCount"/>
													<label for="guestBookCount">Guest Book</label>
													
												</div>
												<div class="o-input s--inline">
													<input type="number" id="signingPhotoCount" name="signingPhotoCount"/>
													<label for="signingPhotoCount">Signing Photo</label>
													
												</div>
												<section class="clear">
													<div class="o-input s--inline">
														<input type="number" id="boardsCount" name="boardsCount"/>
														<label for="boardsCount">Boards</label>
													</div>
													<div class="o-input s--inline">
														<select name="boardSize" id="boardSize">
															<option disabled selected>Size</option>
															<option value="0">A3</option>
															<option value="1">A2</option>
															<option value="2">A1</option>
														</select>
													</div>
												</section>
											</fieldset>
										</div>
										<fieldset>
											<legend>Extras</legend>
											<div class="o-check">
												<input type="checkbox" id="sameDay" name="sameDay" value="1">
												<label for="sameDay">Same Day Video Edit</label>
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
										</fieldset>
										<fieldset>
											<legend>Comment</legend>
											<div class="o-input">
												<textarea name="weddingComment" id="weddingComment" rows="5"></textarea>
											</div>
										</fieldset>
									</div>
									<div id="c-engagement" class="u-hide c-form-group">
										<h3>Engagement</h3>
										<fieldset>
											<div class="o-input u-half">
												<label for="engagementDate">Date</label>
												<input type="text" id="engagementDate" name="engagementDate"/>
											</div>
											<div class="o-input u-half">
												<label for="engagementLocation">Location</label>
												<input type="text" id="engagementLocation" name="engagementLocation"/>
											</div>
										</fieldset>
										<fieldset>
											<div class="o-check">
												<input type="checkbox" id="engagementPhotography" name="engagementPhotography" value="1">
												<label for="engagementPhotography">Photography</label>
												
											</div>
											<div class="o-check">
												<input type="checkbox" id="engagementVideo" name="engagementVideo" value="1">
												<label for="engagementVideo">Video</label>
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
										<h3>Other</h3>
										<fieldset>
											<legend>Comment</legend>
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
						</section>
					</div>
				</div>
			</footer>
		</div>
	</div>	
