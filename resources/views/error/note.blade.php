@if(Session::has('error'))
 <div class="alert alert-danger alert-dismissible" style="padding-top: 3px; padding-bottom: 3px; font-size: 25px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ Session::get('error') }}
  </div>
@endif


@foreach($errors->all() as $error)
	<div class="alert alert-danger alert-dismissible" style="padding-top: 3px; padding-bottom: 3px; font-size: 25px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   {{ $error }}
	</div>
@endforeach



@if(Session::has('success'))
 <div class="alert alert-success alert-dismissible" style="padding-top: 3px; padding-bottom: 3px; font-size: 25px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ Session::get('success') }}
  </div>
@endif


@if(Session::has('successPayCart'))
 <div class="aler alert-success" style="padding: 10px; border-radius: 10px; margin-bottom: 10px; font-size: 25px; ">{{ Session::get('successPayCart') }}</div>
@endif


@if(Session::has('notification'))
 <div class="aler alert-success" style="padding: 10px; border-radius: 10px; margin-bottom: 10px; font-size: 25px; ">{{ Session::get('notification') }}</div>
@endif



