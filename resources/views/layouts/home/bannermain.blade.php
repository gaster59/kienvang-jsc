@if(!empty($bannerMain))
<div class="row">
    <div class="col-lg-12 text-center margin-top10">
        <a title="" href="" target="_self">
            <img class="img-fluid" src="{{ url('/banner/'.$bannerMain->avatar) }}" title="{{ $bannerMain->title }}"></a>
    </div>
</div>
@endif