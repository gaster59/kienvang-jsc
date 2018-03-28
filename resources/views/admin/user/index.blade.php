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
            <li class="active">Users</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách User
                    {{-- <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('banner.add')) }}">
                            Thêm
                        </a>
                        |
                        <a class="btn btn-primary" href="javascript:void(0);">
                            Xóa
                        </a>
                    </div> --}}
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="bs-checkbox ">
                                </th>

                                <th>
                                    Email
                                </th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td>
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    {!!html_entity_decode($item->message)!!}
                                </td>
                                <td>
                                        <a href="{{ route('user.view',['id'=>$item->id])  }}">Xem chi tiết</a>
                                        |
                                        @php(
                                            $urlDelete = route('user.delete',['id'=>$item->id])
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
                            {{ $users->links() }}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection