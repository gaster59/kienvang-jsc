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
                <a href="{{ url('admin/applyjob') }}">
                    Thông tin
                </a>
            </li>
            <li class="active">Xem chi tiết thông tin ứng tuyên</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ưng tuyển</h1>
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
                                    <td>{{ $apply->username }}</td>
                                </tr>
                                <tr>
                                    <td>Vị trí ứng tuyển</td>
                                    <td>{{ $apply->jobname }}</td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>{!!html_entity_decode($apply->text)!!}</td>
                                </tr>
                                <tr>
                                    <td>Ngày ứng tuyển</td>
                                    <td>{{ $apply->created_at }}</td>
                                </tr>
                                
                                <tr>
                                    <td>CV</td>
                                    <td>
                                        <a href="{{ url('/cvapply/')}}/{{$apply->cv}}" download="{{ url('/cvapply/')}}/{{$apply->cv}}">
                                            <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download">Download</i></button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><a target="_blank" href="{{ route('user.view',['id'=>$apply->userid])  }}" >Thông tin ứng viên</a></td>
                                    @php
                                        $slug = str_slug($apply->jobname);
                                      @endphp
                                    <td><a target="_blank" href="{{ route('front.jobs.detail',['id'=>$apply->jobid,'slug'=> $slug ])  }}" >Thông tin công việc</a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

@endsection