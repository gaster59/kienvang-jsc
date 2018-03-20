@if(!empty($bannersfooter))
	@foreach($bannersfooter as $key=>$val)
	    <div class="col-lg-12 text-center margin-top10">
	        <a title="" href="">
	            <img class="img-fluid" src="{{ url('/banner/'.$val->avatar) }}" title="{{ $val->title }}"></a>
	    </div>
	@endforeach
@endif