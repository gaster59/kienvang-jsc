@extends('layouts.admin.index')

@section('title', 'Admin page')

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
            <li class="active">Danh mục</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách danh mục
                    <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('category.add')) }}">
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
                                    Tên danh mục
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $item)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <a href="#">
                                        {{ $item->name  }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit',['id'=>$item->id])  }}">Edit</a>
                                    |
                                    <a data-link="#"
                                       href="javascript:void(0)"
                                       onclick="common.fnDelete(this)">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection