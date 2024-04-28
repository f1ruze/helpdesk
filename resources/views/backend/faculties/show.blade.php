@extends('layouts.backend.master')
@section('title', 'Faculty')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'faculties', 'id' => $faculty->id])
                    @include('backend.faculties.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'faculties', 'id' => ['faculty' => $faculty->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
