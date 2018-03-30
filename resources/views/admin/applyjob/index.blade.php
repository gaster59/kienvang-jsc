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
            <li class="active">Applies</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Applies</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách Apply công việc
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
                                <th>Tên ứng viên</th>
                                <th>
                                    Công việc ứng tuyển
                                </th>
                                <th>Ngày ứng tuyển</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applies as $item)
                            <tr>
                                <td>
                                    @if($item->view == 0)
                                        <i class="glyphicon glyphicon-eye-close"></i>
                                    @else
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    @endif
                                </td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->jobname }}</td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                        <a href="{{ route('apply.view',['id'=>$item->id])  }}">Chi tiết</a>
                                        | 
                                        @if($item->view == 0)
                                            <a href="{{ route('apply.read',['id'=>$item->id])  }}">Đã xem</a>
                                        @else
                                            <a href="{{ route('apply.read',['id'=>$item->id])  }}">Chưa xem</a>
                                        @endif
                                        |
                                        @php(
                                            $urlDelete = route('apply.delete',['id'=>$item->id])
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
                            {{ $applies->links() }}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection