<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="brand-carousel">
				@foreach($producer as $key => $value)
				<div class="brand-item"><a href="{{ route('frontend.getSearchBrand',$value->id) }}"><img src="../storage/app/public/producer/{{ $value->logo}}" alt="" /></a></div>
				@endforeach
			</div>
		</div>
	</div>
</div>