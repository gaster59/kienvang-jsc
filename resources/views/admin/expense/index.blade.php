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
            <li class="active">Chi tiêu</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiêu</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách chi tiêu
                    <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('expense.add')) }}">
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
                                    Chi tiêu
                                </th>
                                <th>
                                    Hình
                                </th>
                                <th>Giá</th>
                                <th>Danh mục chi tiêu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $item)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <a href="{{ route('expense.edit', ['id'=>$item->id]) }}">
                                        {{ $item->name  }}
                                    </a>
                                </td>
                                <td>
                                    @if($item->avatar != '')
                                    <img src="{{ url('/expense/'.$item->avatar) }}" class="img-thumbnail"
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
                                    <a href="{{ route('expense.edit',['id'=>$item->id])  }}">Edit</a>
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
                                    {{ $expenses->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection