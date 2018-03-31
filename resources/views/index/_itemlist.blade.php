@if(!empty($jobs[0]->id) || !empty($news[0]->id))
  <section>
    <div id="exTab2" class="padding-top20">
      <ul class="nav nav-tabs">
        @if(!empty($jobs[0]->id))
        <li class="active">
          <a  href="#1" data-toggle="tab">Tin tuyển dụng ({{$jobs->total()}})</a>
        </li>
        @endif
        @if(!empty($news[0]->id))
        <li>
          <a href="#2" data-toggle="tab">Tin tức ({{$news->total()}})</a>
        </li>
        @endif

      </ul>

        <div class="tab-content ">

        @if(!empty($jobs[0]->id))

          <div class="tab-pane active" id="1">
            <div class="bd-example">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Việc làm</th>
                      <th scope="col">Tên công ty</th>
                      <th scope="col">Ngành nghề</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($jobs as $val=>$item)
                    <tr>
                      <th scope="row">
                        <a target="_blank" class="link" title="{{$item->name}}" href="{{ url(route('front.jobs.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}">{{$item->name}}</a>
                      </th>
                      <td>{{ $item->company_name }}</td>
                      <td>{{ $item->major_name }}</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <div class="text-center margin-top10">
                  {{ $jobs->appends(['tab' => 1,'q' => $keysearch])->links() }}
                </div>

            </div>
          </div>
        @endif
        @if(!empty($news[0]->id))
        <div class="tab-pane" id="2">
          <div class="bd-example">
              

            <ul class="list-unstyled list-news">
                @php
                    $i = 0;
                @endphp
                @foreach($news as $item)
                    @php
                        $cls = '';
                        if ($i%2 == 1) {
                            $cls = "background-color: rgb(239, 248, 250)";
                        }
                    @endphp
                    <li style="{{ $cls }}">
                        <div class="lng_right">
                            <div class="lng_right_top">
                                <a href="{{ url(route('front.news.detail', ['id'=>$item->id, 'slug'=> $item->slug] )) }}" title="" target="_blank">
                                    <span class="h1">{{ $item->name }}</span>
                                </a>
                                @if($item->is_hot == 1)
                                    <span class="newtag">Hot</span>
                                @endif
                                <p class="des">
                                    {{ $item->description }}
                                </p>
                            </div>
                            <div class="lng_r_info">
                                <span class="date">{{ $item->updated_at }}</span>
                            </div>
                        </div>
                    </li>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </ul>


            <div class="text-center margin-top10">
              {{ $news->appends(['tab' => 2,'q' => $keysearch])->links() }}
            </div>

          </div>
        </div>
        @endif

        </div>
    </div>
  </section>
  @else
  <section>
    <div id="exTab2" class="padding-top20">No result</div>
  </section>
  @endif
<script type="text/javascript">
    $(function(){
      $("#exTab2 ul li").click(function(){
        $(this).parent().children().removeClass("active");
        $(this).addClass("active");
      });
    });
</script>