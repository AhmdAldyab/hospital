@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('section.section') }} : {{ $section->name }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('section.section') }} : {{ $section->name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('section.section') }} : {{ $section->name }}</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_room"
                    aria-pressed="true">{{ trans('section.add_room') }}</a><br><br>
                <div class="row">
                    @foreach ($rooms as $room)
                        <div class="col-md-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $room->name }}</h5>
                                    <h6> {{ trans('section.Specialization') }} : {{ $room->specialization->name }}
                                    </h6>
                                    <h6> {{ trans('section.section') }} : {{ $room->section->name }}</h6>
                                    <p class="card-text">{{ $room->description }}</p>
                                    <a href="{{ route('section.show', $room->id) }}"
                                        class="btn btn-outline-info">{{ trans('section.show_room') }}</a>
                                </div>
                            </div>
                            <div class="">
                                <a href="" class="btn btn-light btn-sm" title="{{ trans('section.edit') }}"
                                    role="button" aria-pressed="true" data-toggle="modal"
                                    data-target="#Edit_room{{ $room->id }}"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm" title="{{ trans('section.delete') }}"
                                    role="button" aria-pressed="true" data-toggle="modal"
                                    data-target="#Delete_room{{ $room->id }}"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <!-- edit_room -->
                        <div class="modal fade" id="Edit_room{{ $room->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('section.edit_room') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('room.update', 'test') }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $room->id }}">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="inputEmail4">{{ trans('main_trans.name_en') }}</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ $room->getTranslation('name', 'en') }}"
                                                        name="name_en" required>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="inputEmail4">{{ trans('main_trans.name_ar') }}</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ $room->getTranslation('name', 'ar') }}"
                                                        name="name_ar" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail4">{{ trans('main_trans.description') }}</label>
                                                <textarea class="form-control" name="description" id="description" cols="10" rows="3">{{ $room->description }}</textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('section.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('section.save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete_room -->
                        <div class="modal fade" id="Delete_room{{ $room->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('section.delete_room') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('room.destroy', 'test') }}" method="post">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            {{ trans('doctor.Warning_Doctor') }}
                                            <input type="hidden" name="name" id="id"
                                                value="{{ $room->getTranslation('name', 'en') }}">
                                            <input id="id" type="hidden" name="id" class="form-control"
                                                value="{{ $room->id }}">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('section.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-danger">{{ trans('section.delete') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- add room -->
            <div class="modal fade" id="Add_room" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                {{ trans('section.add') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('room.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="specialization_id"
                                    value="{{ $section->specialization_id }}">
                                <input type="hidden" name="id" value="{{ $section->id }}">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="inputEmail4">{{ trans('main_trans.name_en') }}</label>
                                        <input class="form-control" type="text" name="name_en" required>
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputEmail4">{{ trans('main_trans.name_ar') }}</label>
                                        <input class="form-control" type="text" name="name_ar" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail4">{{ trans('main_trans.description') }}</label>
                                    <textarea class="form-control" name="description" id="description" cols="10" rows="3"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('section.close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('section.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
