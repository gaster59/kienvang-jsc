@extends('layouts.admin.index')

@section('title', $title)

@section('css_path')
    @parent
@endsection

@section('js_path')
    @parent
    <script type="text/javascript" src="{{ "/admin/js/chart.min.js" }}"></script>
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
                    Thống kê
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--*/$strDates = '';/*--}}
    @php
        $strDates = '';
        $strExpense = '';
    @endphp
    @foreach($expenses as $item)
        @php
            $dates = $item->created_at;
            $newDate = date('Y-m-d', strtotime($dates));
            $strDates .= $newDate.',';
            $strExpense .= $item->price.',';
        @endphp
    @endforeach

    @php
        $strDates = rtrim($strDates,',');
        $strExpense = rtrim($strExpense, ',');
    @endphp

    <input type="hidden" id="strDates" value="{{ $strDates }}" />
    <input type="hidden" id="strExpenses" value="{{ $strExpense }}" />
    <script type="text/javascript" src="{{ "/admin/js/chart-data.js" }}"></script>
@endsection