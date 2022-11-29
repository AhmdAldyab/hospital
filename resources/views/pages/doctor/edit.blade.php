@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('doctor.edit') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('doctor.edit') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ trans('doctor.edit') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{ route('doctor.update','test') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{$doctor->id}}">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4"> {{ trans('doctor.name_ar') }}</label>
                            <input type="text" class="form-control" value="{{ $doctor->getTranslation('name','ar') }}" name="name_ar"
                                required>
                        </div>
                        <div class="form-group col">
                            <label for="inputEmail4"> {{ trans('doctor.name_en') }}</label>
                            <input type="text" class="form-control" value="{{ $doctor->getTranslation('name','en') }}" name="name_en"
                                required>
                        </div>
                        <div class="form-group col">
                            <label for="inputEmail4"> {{ trans('doctor.password') }}</label>
                            <input type="text" class="form-control" value="{{ old('password') }}" name="password" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4"> {{ trans('doctor.email') }}</label>
                            <input type="email" class="form-control" value="{{ $doctor->email }}" name="email"
                                required>
                        </div>
                        <div class="form-group col">
                            <label for="inputEmail4"> {{ trans('doctor.number_phone') }}</label>
                            <input type="number" class="form-control" value="{{ $doctor->number_phone }}"
                                name="number_phone" required>
                        </div>
                        <div class="form-group col">
                            <label for="inputEmail4"> {{ trans('doctor.date_hiring') }}</label>
                            <input type="date" class="form-control" value="{{ $doctor->date_hiring }}"
                                name="date_hiring" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="statusSpech">{{ trans('doctor.specialization') }}</label>
                            <select name="specialization_id" class="custom-select mr-sm-2" required>
                                <option selected value="{{ $doctor->specialization_id }}" >{{ $doctor->specialization->name }}</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="statusSpech">{{ trans('doctor.specialization') }}</label>
                            <select name="section_id" class="custom-select mr-sm-2" required>
                                <option selected value="{{ $doctor->specialization_id }}" >{{ $doctor->section->name }}</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="statusSpech">{{ trans('doctor.gender') }}</label>
                            <select name="gender_id" class="custom-select mr-sm-2" required>
                                <option selected value="{{$doctor->gender_id}}" >{{ $doctor->gender->name }}</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adreesst">{{ trans('doctor.adrees') }}</label>
                        <input type="text" name="adrees" class="form-control" value="{{ $doctor->adrees }}"
                            required>
                    </div>
                    <div class="form-group">
                        <span class="text-danger">{{trans('doctor.attachments')}} : </span>
                        <input type="file" accept="pdf/image/*" name="files_doctor[]" multiple >
                    </div>
                    
                    <button type="submit" class="btn btn-primary">{{ trans('doctor.save') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
