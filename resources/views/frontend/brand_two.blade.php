<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="brand-carousel">
				@foreach($producer as $key => $value)
				<div class="brand-item">
					@if(request()->p)
					<a href="{{url()->current()}}?p={{request()->p}}&producer={{ $value->id}}">
						<img src="../storage/app/public/producer/{{ $value->logo}}" alt="" />
					</a>
					@else
					<a href="{{url()->current()}}?producer={{ $value->id}}">
						<img src="../storage/app/public/producer/{{ $value->logo}}" alt="" />
					</a>
					@endif
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>