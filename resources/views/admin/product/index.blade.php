@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
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
            <li class="active">Sản phẩm</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách sản phẩm
                    <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('product.add')) }}">
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
                                    Tên sản phẩm
                                </th>
                                <th>
                                    Hình sản phẩm
                                </th>
                                <th>Giá</th>
                                <th>Danh mục</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <a href="{{ route('product.edit', ['id'=>$item->id]) }}">
                                        {{ $item->name  }}
                                    </a>
                                </td>
                                <td>
                                    @if($item->avatar != '')
                                    <img src="{{ url('/avatar/'.$item->avatar) }}" class="img-thumbnail"
                                        style="width: 100px;height: 100px;"/>
                                    @endif
                                </td>
                                <td>
                                    {{ number_format($item->price) }}
                                </td>
                                <td>
                                    {{ $item->cat_name }}
                                </td>
                                <td>
                                    <a href="{{ route('product.edit',['id'=>$item->id])  }}">Edit</a>
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
                                    {{ $products->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection