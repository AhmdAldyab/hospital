@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('doctor.attachments')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('doctor.attachments')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{trans('doctor.attachments')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="form-row">
                    @forelse ($files as $item)
                        <div class="col-md-4">
                            <div class="form-row">
                                <a href="{{route('doctor.open_file',$item->id)}}" class="form-control" target="_blank" title="{{trans('doctor.show')}}">
                                    <input class="btn btn-info" style="text-align: center" type="text" value="{{$item->filename}}" readonly>
                                </a> 
                                <a href="{{route('doctor.delete_attch',$item->id)}}" class="btn btn-danger hover" role="button">{{trans('doctor.delete')}}</a>&nbsp;&nbsp;
                                <a href="{{route('doctor.download',$item->id)}}" class="btn btn-success hover" role="button">{{trans('doctor.download')}}</a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            <strong>there is no files</strong>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
