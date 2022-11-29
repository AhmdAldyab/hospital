@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.list_doctors') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.list_doctors') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.list_doctors') }}</li>
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
                <a href="{{ route('doctor.create') }}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">{{ trans('doctor.add') }}</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>{{ trans('doctor.name') }}</th>
                                <th>{{ trans('doctor.email') }}</th>
                                <th>{{ trans('doctor.date_hiring') }}</th>
                                <th>{{ trans('doctor.adrees') }}</th>
                                <th>{{ trans('doctor.number_phone') }}</th>
                                <th>{{ trans('doctor.specialization') }}</th>
                                <th>{{ trans('doctor.gender') }}</th>
                                <th>{{trans('doctor.section')}}</th>
                                <th>{{ trans('doctor.processes') }}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->date_hiring }}</td>
                                    <td>{{ $doctor->adrees }}</td>
                                    <td>{{ $doctor->number_phone }}</td>
                                    <td>{{ $doctor->specialization->name }}</td>
                                    <td>{{ $doctor->gender->name }}</td>
                                    <td>{{ $doctor->section->name }}</td>
                                    <td>
                                        <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-info btn-sm"
                                            role="button" title="{{ trans('doctor.edit') }}" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#Delete_Doctor{{ $doctor->id }}"
                                            title="{{ trans('doctor.delete') }}"><i class="fa fa-trash"></i></button>
                                        <a href="{{ route('doctor.show', $doctor->id) }}" class="btn btn-warning btn-sm"
                                            role="button" title="{{ trans('doctor.show') }}" aria-pressed="true"><i
                                                class="fa fa-eye"></i></a>

                                    </td>
                                </tr>
                                @include('pages.doctor.delete')
                            @endforeach
                        </tbody>
                    </table>
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
