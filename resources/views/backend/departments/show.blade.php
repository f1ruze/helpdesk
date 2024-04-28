@extends('layouts.backend.master')
@section('title', 'Department')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'departments', 'id' => $department->id])
                    @include('backend.departments.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'departments', 'id' => ['department' => $department->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
