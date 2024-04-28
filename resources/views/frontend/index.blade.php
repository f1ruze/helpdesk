@extends('frontend.layouts.master')
@section('header')
@include('frontend.includes.header')
@endsection
@section('content')
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf

        <div class="form-group">
            <label for="faculty">Fakultə:</label>
            <select class="form-control" id="faculty" name="faculty" >
                <option value="">Fakultəni seç</option>
                <option value="Hava nəqliyyatı fakültəsi">Hava nəqliyyatı fakültəsi</option>
                <option value="Nəqliyyat texnologiyaları fakültəsi">Nəqliyyat texnologiyaları fakültəsi</option>
                <option value="Aerokosmik fakültə">Aerokosmik fakültə</option>
                <option value="Fizika-texnologiya fakültəsi">Fizika-texnologiya fakültəsi</option>
                <option value="İqtisadiyyat və hüquq fakültəsi">İqtisadiyyat və hüquq fakültəsi</option>
                <option value="Qiyabi fakültə">Qiyabi fakültə</option>
            </select>
        </div>

        <div class="form-group">
            <label for="department">Kafedra:</label>
            <select class="form-control" id="department" name="department" >
                <option value="">Kafedranı seç</option>
                <option value="Hava gəmilərinin uçuş istismarı">Hava gəmilərinin uçuş istismarı</option>
                <option value="Uçuş aparatları və aviasiya mühərrikləri">Uçuş aparatları və aviasiya mühərrikləri</option>
                <option value="Avionika">Avionika</option>
                <option value="Aviasiya meteorologiyası">Aviasiya meteorologiyası</option>
                <option value="Aeronaviqasiya">Aeronaviqasiya</option>
                <option value="Kimya və materialşünaslıq">Kimya və materialşünaslıq</option>
                <option value="Aviasiya təhlükəsizliyi">Aviasiya təhlükəsizliyi</option>
                <option value="Avianəqliyyat istehsalatı">Avianəqliyyat istehsalatı</option>
                <option value="Nəqliyyat mexanikası">Nəqliyyat mexanikası</option>
                <option value="Ali riyaziyyat">Ali riyaziyyat</option>
                <option value="Kompüter sistemləri və proqramlaşdırma">Kompüter sistemləri və proqramlaşdırma</option>
                <option value="Peşəkar ingilis dili">Peşəkar ingilis dili</option>
                <option value="Ətraf mühitin aerokosmik monitorinqi">Ətraf mühitin aerokosmik monitorinqi</option>
                <option value="Aerokosmik informasiya sistemləri">Aerokosmik informasiya sistemləri</option>
                <option value="Ümumi və tətbiqi fizika">Ümumi və tətbiqi fizika</option>
                <option value="Radioelektronika">Radioelektronika</option>
                <option value="Aerokosmik cihazlar">Aerokosmik cihazlar</option>
                <option value="Energetika və avtomatika">Energetika və avtomatika</option>
                <option value="İqtisadiyyat">İqtisadiyyat</option>
                <option value="Menecment">Menecment</option>
                <option value="Hüquq">Hüquq</option>
                <option value="Dil və ictimai fənlər">Dil və ictimai fənlər</option>
                <option value="İngilis dili">İngilis dili</option>
            </select>
        </div>

        <div class="form-group">
            <label for="teacher">Müəllim:</label>
            <input type="text" class="form-control" id="teacher" name="teacher" >
        </div>

        <div class="form-group">
            <label for="student">Tələbə:</label>
            <input type="text" class="form-control" id="student" name="student" >
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>

        <div class="form-group">
            <label for="type">Tipi:</label>
            <select class="form-control" id="type" name="type" >
                <option value="">Tipi seç</option>
                <option value="hardware">Hardware</option>
                <option value="software">Software</option>
            </select>
        </div>

        <div class="form-group">
            <label for="category">Kateqoriya:</label>
            <select class="form-control" id="category" name="category" >
                @foreach($categories as $category)
                <option value="">{{translation($category)->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="priority">Prioritet:</label>
            <select class="form-control" id="priority" name="priority" >
                <option value="">Prioriteti seç</option>
                <option value="low">Aşağı</option>
                <option value="medium">Orta</option>
                <option value="high">Yüksək</option>
            </select>
        </div>

        <div class="form-group">
            <label for="message">Mesaj:</label>
            <textarea class="form-control" id="message" name="message" rows="4" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-submit"
                data-url="{{ route('frontend.registerSendRequest') }}">Göndər</button>
    </form>

@endsection
