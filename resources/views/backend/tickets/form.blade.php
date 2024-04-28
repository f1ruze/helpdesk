@extends('layouts.backend.master')
@section('title', trans('backend.titles.donations'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/datepicker.min.css') }}">
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'donations'])
                    <form action="{{ $edit === false ?  route('backend.donations.store') : route('backend.donations.update', ['donation' => $donation->id]) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="faculty" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Faculty
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="faculty" type="text" class="form-control @error('faculty') is-invalid @enderror"
                                           name="faculty" value="{{ $edit ? $donation->faculty : old('faculty') }}">
                                    @error('faculty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="department" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Department
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror"
                                           name="department" value="{{ $edit ? $donation->department : old('department') }}">
                                    @error('department')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="teacher" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Teacher
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror"
                                           name="teacher" value="{{ $edit ? $donation->teacher : old('teacher') }}">
                                    @error('teacher')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="student" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Student
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="student" type="text" class="form-control @error('student') is-invalid @enderror"
                                           name="student" value="{{ $edit ? $donation->student : old('student') }}">
                                    @error('student')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Email
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $edit ? $donation->email : old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Type
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror"
                                           name="type" value="{{ $edit ? $donation->type : old('type') }}">
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Category
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror"
                                           name="category" value="{{ $edit ? $donation->category : old('category') }}">
                                    @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="priority" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Priority
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input id="priority" type="text" class="form-control @error('priority') is-invalid @enderror"
                                           name="priority" value="{{ $edit ? $donation->priority : old('priority') }}">
                                    @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="message" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Message
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <textarea id="message" class="form-control @error('message') is-invalid @enderror"
                                              name="message" rows="5">{{ $edit ? $donation->message : old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if ($edit)
                            @include('backend.includes.media',[
                                    'model' => $donation,
                                    'name'  => 'donation',
                                    'media_collection_name'  => 'donations',
                                    'isDeleted' => true,
                                    'isCovered' => false,
                                     ])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
