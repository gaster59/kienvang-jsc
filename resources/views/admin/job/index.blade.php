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
            <li class="active">Việc làm</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Việc làm</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách việc làm
                    <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('job.add')) }}">
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
                                    Tên việc làm
                                </th>
                                <th>
                                    Công ty
                                </th>
                                <th>Ngành nghề</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $item)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <a href="{{ route('job.edit', ['id'=>$item->id]) }}">
                                        {{ $item->name  }}
                                    </a>
                                </td>
                                <td>
                                    {{ $item->company_name  }}
                                </td>
                                <td>
                                    {{ $item->major_name }}
                                </td>
                                <td>
                                    <a href="{{ route('job.edit',['id'=>$item->id])  }}">Edit</a>
                                    |
                                   @php(
                                        $urlDelete = route('job.delete',['id'=>$item->id])
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
                                <td colspan="5" style="text-align: center;">
                                    {{ $jobs->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection