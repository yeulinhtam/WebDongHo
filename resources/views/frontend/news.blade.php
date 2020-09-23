<div class="perfect-service" style="margin-bottom: 50px;">
	<div class="container">
		<div class="area-title">
			<h2>TIN TỨC & HƯỚNG DẪN</h2>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="perfect-banner">
					<iframe width="100%" height="400px;" src="https://www.youtube.com/embed/5bvcyIV4yzo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-md-4">
				<div class="creative-banner">
					@foreach($news as $key => $value)
					<div class="creative-info">
						<div class="creative-icon">
							<img src="../storage/app/public/news/{{ $value->image}} " width="100px" height="100px">
						</div>
						<div class="creative-text">
							<h3><a href="{{ route('frontend.newsDetail',$value->id) }}">{{ $value->name }}</a></h3>
							<p>{{ $value->time }}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>	