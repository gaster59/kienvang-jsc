@if(!empty($companies_right))

    @foreach($companies_right as $company)
        <div class="block-1 margin-bottom5">
            <a title="{{$company->name}}" class="" target="_blank" href="{{$company->website}}">
                <img style="width: 238px;"
                     src="{{ url('/company/'.$company->avatar) }}" alt="{{$company->name}}">
            </a>
        </div>
    @endforeach

@endif