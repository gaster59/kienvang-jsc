@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript">
        function fnDelete(urlDelete) {
            if (confirm('Bạn có muốn xóa không')) {
                window.location.href = urlDelete;
            }
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
            <li class="active">Banner</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Banner</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách banner
                    <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('banner.add')) }}">
                            Thêm
                        </a>
                        |
                        <a class="btn btn-primary" href="javascript:void(0);">
                            Xóa
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="bs-checkbox ">
                                </th>

                                <th>
                                    Hình banner
                                </th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $item)
                            <tr>
                                <td>
                                </td>
                                <td>
                                    @if($item->avatar != '')
                                    <img src="{{ url('/banner/'.$item->avatar) }}" class="img-thumbnail"
                                        style="width: 200px;height: 100px;"/>
                                    @endif
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td>
                                    <a href="{{ route('banner.edit',['id'=>$item->id])  }}">Edit</a>
                                    |
                                    @php(
                                        $urlDelete = route('banner.delete',['id'=>$item->id])
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

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection