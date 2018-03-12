@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript"
            src="{{ "/admin/js/imports/index.js" }}">
    </script>
@endsection

@section('content')
    <input type="hidden" id="hdnUrlDetailImport" value="{{ route('ajax.imports.detail') }}">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg>
                </a>
            </li>
            <li class="active">Nhập kho</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nhập kho</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách nhập kho
                    <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('imports.add')) }}">
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
                                Người tạo
                            </th>
                            <th>
                                Tổng tiền hóa đơn
                            </th>
                            <th>
                                Ngày tạo
                            </th>
                            <th>Ghi chú</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderImports as $item)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    {{ $item->name  }}
                                </td>
                                <td>
                                    {{ number_format($item->total) }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    {{ $item->info }}
                                </td>
                                <td>
                                    <a href="#" onclick="showModal({{ $item->id }})">Xem chi tiết</a>
                                    |
                                    <a data-link="#"
                                       href="javascript:void(0)"
                                       onclick="common.fnDelete(this)">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" style="text-align: center;">
                                {{ $orderImports->links() }}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalOrderImport" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết nhập kho</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-hover" id="table-modal">
                        <thead>
                            <tr>
                                <th>
                                    Sản phẩm
                                </th>
                                <th>
                                    Giá
                                </th>
                                <th>
                                    Số lượng
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" style="text-align: center">

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection