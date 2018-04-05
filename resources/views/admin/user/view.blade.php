@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript" src="{{ "/admin/js/ckeditor/ckeditor.js" }}"></script>
@endsection

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">
                <a href="{{ url('admin/user') }}">
                    Thông tin user
                </a>
            </li>
            <li class="active">Xem chi tiết thông tin user</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thông tin
                </div>

                <div class="panel-body">
                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Tên</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Sinh nhật</td>
                                    <td>{{ $user->birthday }}</td>
                                </tr>
                                <tr>
                                    <td>Giới tính</td>
                                    <td>{{ ($user->gender == 0) ? "Nam" : "Nữ"  }}</td>
                                </tr>
                                <tr>
                                    <td>Tình trạng hôn nhân</td>
                                    <td>{{ ($user->couple == 0) ? "Độc thân" : "Kết hôn" }}</td>
                                </tr>
                                <tr>
                                    <td>Tỉnh/thành phố</td>
                                    <td>{{ $user['info']->city }}</td>
                                </tr>
                                <tr>
                                    <td>Quận/Huyện</td>
                                    <td>{{ $user['info']->state }}</td>
                                </tr>
                                <tr>
                                    <td>Học vấn</td>
                                    <td>{{ $academiccareer[$user['info']->academiccareer]  }}</td>
                                </tr>
                                <tr>
                                    <td>Trường</td>
                                    <td>{{ $user['info']->school }}</td>
                                </tr>
                                <tr>
                                    <td>Ngành</td>
                                    <td>{{ $user['info']->major }}</td>
                                </tr>
                                <tr>
                                    <td>Bằng cấp khác</td>
                                    <td>{{ $user['info']->qualifications }}</td>
                                </tr>
                                @if($user->category_id == 2 && !empty($user->curriculum_vitae))
                                <tr>
                                    <td>CV</td>
                                    <td>
                                        <a href="{{ url('/cv/')}}/{{$user->curriculum_vitae}}" download="{{ url('/cv/')}}/{{$user->curriculum_vitae}}">
                                            <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download">Download</i></button>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

@endsection