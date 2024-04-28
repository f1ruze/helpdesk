@extends('layouts.backend.master')
@section('title', 'Category')
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
                    @include('backend.includes.form.header', ['page' => 'categories'])
                    <form action="{{ $edit === false ?  route('backend.categories.store') : route('backend.categories.update', ['category' => $category->id]) }}"
                          method="POST"  enctype="multipart/form-data">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <ul class="nav nav-light-primary nav-pills" role="tablist">
                                        @foreach ($langs as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif" id="tab-{{ $lang->code }}" data-toggle="tab" href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $lang->code }}"
                                         role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"
                                                           name="name:{{ $lang->code }}"
                                                           value="{{ isset($category) ? $category->translate($lang->code)?->name : old('name:'.$lang->code) }}"
                                                           placeholder="@lang('backend.labels.name')">
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="type:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                Tipi ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="type:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("type:$lang->code")) is-invalid @endif"
                                                           name="type:{{ $lang->code }}"
                                                           value="{{ isset($category) ? $category->translate($lang->code)?->type : old('type:'.$lang->code) }}"
                                                           placeholder="Tipi">
                                                    @if ($errors->has("type:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("type:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input type="checkbox" class="bool" name="status"
                                                        value="{{ isset($category) ? $category->status : old('status') }}"
                                                     {{ (isset($category) ? old('status',$category->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="form-group row">--}}
{{--                            <label class="col-form-label text-right col-lg-3 col-sm-12">--}}
{{--                                @lang('backend.labels.image')--}}
{{--                                @if(!$edit)--}}
{{--                                    <span class="text-danger">*</span>--}}
{{--                                @endif--}}
{{--                            </label>--}}
{{--                            <div class="col-lg-6 col-md-9 col-sm-12">--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror"--}}
{{--                                               name="image[]" multiple="multiple" accept="image/*">--}}
{{--                                        <label class="custom-file-label">--}}
{{--                                            @lang('backend.placeholders.choose.image')--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    @error('image')--}}
{{--                                    <div class="invalid-feedback d-block">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        @include('backend.includes.form.footer')
                    </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if ($edit)
                            @include('backend.includes.media',[
                            'model' => $category,
                            'name' => 'category',
                            'isMain' => false,
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

