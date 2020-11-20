<section class="info_section  layout_padding2-top">
	<div class="social_container">
		<div class="social_box">
			<a href="https://{{$settings->facebook}}"><img src="../FrontDesign/images/fb.png" alt=""></a>
			<a href="https://{{$settings->twitter}}"><img src="../FrontDesign/images/twitter.png" alt=""></a>
			<a href="https://{{$settings->linkedin}}"><img src="../FrontDesign/images/linkedin.png" alt=""></a>
			<a href="https://{{$settings->google}}"><img src="../FrontDesign/images/google.png" alt=""></a>
		</div>
	</div>
	<div class="info_container">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<h6>ABOUT US</h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,</p>
				</div>
				<div class="col-md-6 col-lg-3">
					<h6>Instagram</h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit</p>
				</div>
				<div class="col-md-6 col-lg-3">
					<h6>NEED HELP</h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,</p>
				</div>
				<div class="col-md-6 col-lg-3">
					<h6>CONTACT US</h6>
					<div class="info_link-box">
						<a href=""><img src="../FrontDesign/images/location.png" alt=""><span> {{ $settings->address1 }} {{ $settings->address2 }} </span></a>
						<a href=""><img src="../FrontDesign/images/call.png" alt=""><span> {{ $settings->contact1 }} {{ $settings->contact2 }} </span></a>
						<a href=""><img src="../FrontDesign/images/mail.png" alt=""><span> {{ $settings->email1 }} {{ $settings->email2 }} </span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class=" footer_section">
		<div class="container">
			<p>&copy; <span id="displayYear"></span> {{ $settings->footer }}</p>
		</div>
	</section>
</section>