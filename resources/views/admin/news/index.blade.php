@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript">
        $(function(){
            $('#btn_search').click(function(){
                search();
            });
        })
        function fnDelete(url) {
            if (confirm('Bạn có muốn xóa không ?')) {
                window.location.href = url;
            }
        }
        function changeurl(string){
            var new_url= "{{ url(route('newssearch')) }}" + string;
            window.history.pushState("data","Title",new_url);
        }
        function search(){
            var data = {
                keysearch : $('#input_search').val()
            };
            $.ajax({
                type : 'POST',
                dataType : 'json',
                data : data,
                async: false,
                url : '{{ url(route('newssearch')) }}',
                success : function (result){
                    if (result.error == false && result.html != '') {
                      $(".result-search").html(result.html);
                      changeurl("?keysearch="+$('#input_search').val());
                      //console.log(result);

                    }
                }
            });
        }
    </script>
@endsection

@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a>
            </li>
            <li class="active">Tin tức</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tin tức</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách tin tức
                    <div style="float:right;">
                    <input value="{{ $keysearch  }}" style="padding: 5px;margin: 0;height: 30px;border: 1px solid #cdcdcd; font-size: 12px;" type="text" id="input_search">
                    <button id="btn_search" class="btn btn-primary">Tìm</button>
                        <a class="btn btn-primary" href="{{ url(route('news.add')) }}">
                            Thêm
                        </a>
                        {{-- |
                        <a class="btn btn-primary" href="javascript:void(0);">
                            Xóa
                        </a> --}}
                    </div>
                </div>
                <div class="panel-body result-search">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="bs-checkbox ">

                                </th>
                                <th>
                                    Tên tin tức
                                </th>
                                <th>
                                    Tin hot
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $item)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <a href="{{ route('news.edit', ['id'=>$item->id]) }}">
                                        {{ $item->name  }}
                                    </a>
                                </td>
                                <td>
                                    @if($item->is_hot == 1)
                                        <span class="newtag">Hot</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('news.edit',['id'=>$item->id])  }}">Edit</a>
                                    |
                                    @php(
                                        $urlDelete = route('news.delete', ['id'=>$item->id])
                                    )
                                    <a data-link="#"
                                       href="javascript:void(0)"
                                       onclick="fnDelete('{{ $urlDelete }}')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align: center;">
                                    {{ $news->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection