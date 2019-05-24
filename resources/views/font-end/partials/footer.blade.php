<div id="footer">
	<div class="container">
		<div id="footermenu" class="row">
			<div class="col-md-3">
				<div class="logo-footer">
					<img src="{{$info_s['logo']}}" alt="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="title-ft">
					<span>Liên hệ</span>
				</div>
				{!! $info_s['address'] !!}
			</div>
			<div class="col-md-2 footer-col-3">
				<!-- fluid template file path: EXT:syn_sm/Resources/Private/Templates/PrivacyShareButton/Show.html -->
				<div class="title-ft">
					<span>Chính sách</span>
				</div>
				{!! $info_s['open_time'] !!}
			</div>
			<div class="col-md-3 footer-col-4">
				<div class="fb">
					{!! $info_s['facebook'] !!}
				</div>
			</div>
		</div>
		<div class="salon-division-wrap row clearafter">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="salon-division-inner-wrap">
					<p class="salon-division-text">
						Goldwell is part of Kao Salon Division.
					</p>
					<p class="salon-division">
						<a target="_blank" href="http://kaosalondivision.com/index.html">
							<img title="KAO Salon Division" alt="KAO Salon Division" src="https://www.goldwell.us/typo3conf/ext/gldw_config/Resources/Public/Templates/gfx/frontend/images/KAO_SD_Logo_black.png">
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>