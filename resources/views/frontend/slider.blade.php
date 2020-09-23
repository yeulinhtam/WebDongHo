<div class="container" style="margin-top: 10px;"><!-- start home slider -->
	<div class="slider-area an-1 hm-1 clr">
		<!-- slider -->
		<div class="bend niceties preview-2">
			<div id="ensign-nivoslider" class="slides">	
				@foreach($banner as $key => $value)
				<img src="../storage/app/public/banner/{{ $value->image }}" alt="" title="#slider-direction-1"/>
				@endforeach
			</div>
			<!-- direction 1 -->
			<div id="slider-direction-1" class="t-cn slider-direction">
				<div class="slider-progress"></div>
				<div class="slider-content t-lfl lft-pr s-tb slider-1">
					<div class="title-container s-tb-c title-compress">

					</div>
				</div>	
			</div>
			<!-- direction 2 -->
			<div id="slider-direction-2" class="slider-direction">
				<div class="slider-progress"></div>
				<div class="slider-content t-lfl s-tb slider-2 lft-pr">
					<div class="title-container s-tb-c">
						</div>
					</div>	
				</div>
				<!-- direction 3 -->
				<div id="slider-direction-3" class="slider-direction">
					<div class="slider-progress"></div>
					<div class="slider-content t-lfl s-tb slider-3 lft-pr">
						<div class="title-container s-tb-c">
						</div>
					</div>	
				</div>
			</div>
			<!-- slider end-->
		</div>
		<!-- end home slider -->
	</div>