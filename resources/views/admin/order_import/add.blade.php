@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript" src="{{ "/admin/js/jquery.number.min.js" }}"></script>
    <script type="text/javascript" src="{{ "/admin/js/imports/add.js" }}"></script>
    <script>
        $(function () {
            $('input.number').number(true);
        });
    </script>
@endsection

@section('content')
    <input type="hidden" id="hdnJsonProduct" value="{{ $jsonProducts }}">
    <input type="hidden" id="hdnImportStore" value="{{ route('ajax.imports') }}">
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
                </div>
                <div class="panel-body">
                    <table class="table table-hover" id="tbl_import">
                        <thead>
                        <tr>
                            <th>
                                Tên sản phẩm
                            </th>
                            <th>
                                Giá sản phẩm
                            </th>
                            <th>
                                Danh mục sản phẩm
                            </th>
                            <th>Số lượng</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="first">
                                <td>
                                    <select class="sel_product" onchange="showDetailProduct(this)">
                                        @foreach($products as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" class="qty number" value="1">
                                </td>
                                <td>
                                    <button class="btn btn-primary" onclick="addRow();">Add</button>
                                </td>
                            </tr>
                            <tr class="hide">
                                <td>
                                    <select class="tmp_sel_product" onchange="showDetailProduct(this)">
                                        @foreach($products as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" class="tmp_qty number" value="1">
                                </td>
                                <td>
                                    <button class="btn btn-primary" onclick="addRow();">Add</button>
                                    <button class="btn btn-primary" onclick="deleteRow(this);">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: center;">
                                    <button class="btn btn-primary" onclick="insertImports();">Thêm</button>
                                    <button class="btn btn-primary" onclick="">Nhập lại</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection