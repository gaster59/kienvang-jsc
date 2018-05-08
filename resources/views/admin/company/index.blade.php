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
            <li class="active">Công ty</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Công ty</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách công ty
                    <div style="float:right;">
                        <a class="btn btn-primary" href="{{ url(route('company.add')) }}">
                            Thêm
                        </a>
                        {{-- |
                        <a class="btn btn-primary" href="javascript:void(0);">
                            Xóa
                        </a> --}}
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="bs-checkbox ">

                                </th>
                                <th>
                                    Tên công ty
                                </th>
                                <th>
                                    Quy mô công ty
                                </th>
                                <th>
                                    Hình
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $item)
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <a href="{{ route('company.edit', ['id'=>$item->id]) }}">
                                        {{ $item->name  }}
                                    </a>
                                </td>
                                <td>
                                    @if($item->scale == '')
                                        {{ "Chưa cập nhật" }}
                                    @else
                                        {{ $item->scale }}
                                    @endif

                                </td>
                                <td>
                                    @if($item->avatar != '')
                                    <img src="{{ url('/company/'.$item->avatar) }}" class="img-thumbnail"
                                        style="width: 100px;height: 100px;"/>
                                    @endif
                                </td>
                                <td>{{-- delete_permanently --}}
                                    <a href="{{ route('company.edit',['id'=>$item->id])  }}">Edit</a>
                                    |
                                    @if($item->status == 1)
                                        @php
                                            $urlDelete = route('company.delete',['id'=>$item->id])
                                        @endphp
                                        <a data-link="#"
                                           href="javascript:void(0)"
                                           onclick="fnDelete('{{ $urlDelete }}')">Delete</a>
                                    @else

                                        @php
                                            $urlDelete = route('company.delete_permanently',['id'=>$item->id])
                                        @endphp
                                        <a data-link="#"
                                           href="javascript:void(0)"
                                           onclick="fnDelete('{{ $urlDelete }}')">Delete Permanently</a>
                                    @endif
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: center;">
                                    {{ $companies->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection