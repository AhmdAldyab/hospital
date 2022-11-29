@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.Lying_Section') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('section.list_section') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Lying_Section') }}</li>
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
                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Add_section"
                    aria-pressed="true">{{ trans('section.add') }}</a><br><br>
                <div class="row">
                    @foreach ($sections as $section)
                        <div class="col-md-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $section->name }}</h5>
                                    <h6> {{ trans('section.Specialization') }} : {{ $section->specialization->name }}
                                    </h6>
                                    <p class="card-text">{{ $section->description }}</p>
                                    <a href="{{route('section.show',$section->id)}}"
                                        class="btn btn-outline-info">{{ trans('section.show_section') }}</a>
                                </div>
                            </div>
                            <div class="">
                                <a href="" class="btn btn-light btn-sm" title="{{ trans('section.edit') }}"
                                    role="button" aria-pressed="true" data-toggle="modal"
                                    data-target="#Edit_section{{$section->id}}"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm" title="{{ trans('section.delete') }}"
                                    role="button" aria-pressed="true" data-toggle="modal" data-target="#Delete_section{{$section->id}}"><i
                                        class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <!-- edit section -->
                        <div class="modal fade" id="Edit_section{{$section->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ $section->name }} {{ trans('section.edit') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('section.update', 'test') }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$section->id}}">
                                            <div class="form-group">
                                                <label for="inputEmail4">{{ trans('main_trans.name_en') }}</label>
                                                <input class="form-control" type="text"
                                                    value="{{ $section->getTranslation('name', 'en') }}" name="name_en"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4">{{ trans('main_trans.name_ar') }}</label>
                                                <input class="form-control" type="text"
                                                    value="{{ $section->getTranslation('name', 'ar') }}" name="name_ar"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail4">{{ trans('section.Specialization') }}</label>
                                                <select name="specialization_id" class="custom-select mr-sm-2" required>
                                                    <option selected value="{{ $section->specialization_id }}">
                                                        {{ $section->specialization->name }}</option>
                                                    @foreach ($specializations as $specialization)
                                                        <option value="{{ $specialization->id }}">
                                                            {{ $specialization->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputEmail4">{{ trans('main_trans.description') }}</label>
                                                <textarea class="form-control" name="description" id="description" cols="10" rows="3">
                                                    {{$section->description}}
                                                </textarea>
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
                        <!-- delete_modal_section -->
                        <div class="modal fade" id="Delete_section{{$section->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('section.delete') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('section.destroy', 'test') }}" method="post">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            {{ trans('doctor.Warning_Doctor') }}
                                            <input id="id" type="hidden" name="id" class="form-control"
                                                value="{{ $section->id }}">
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
            <!-- add section -->
            <div class="modal fade" id="Add_section" tabindex="-1" role="dialog"
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
                            <form action="{{ route('section.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail4">{{ trans('main_trans.name_en') }}</label>
                                    <input class="form-control" type="text" name="name_en" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">{{ trans('main_trans.name_ar') }}</label>
                                    <input class="form-control" type="text" name="name_ar" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail4">{{ trans('section.Specialization') }}</label>
                                    <select name="specialization_id" class="custom-select mr-sm-2" required>
                                        <option selected disabled>{{ trans('section.Choose') }}...</option>
                                        @foreach ($specializations as $specialization)
                                            <option value="{{ $specialization->id }}">{{ $specialization->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
