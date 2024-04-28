<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('departments')->delete();
        $model = Department::create([
            'id' => 1,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Hava gəmilərinin uçuş istismarı',
            ]);
        }

        $model = Department::create([
            'id' => 2,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Uçuş aparatları və aviasiya mühərrikləri',
                ]);
        }

        $model = Department::create([
            'id' => 3,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Avionika',
            ]);
        }


        $model = Department::create([
            'id' => 4,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Aviasiya meteorologiyası',
            ]);
        }

        $model = Department::create([
            'id' => 5,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Aeronaviqasiya',
            ]);
        }



        $model = Department::create([
            'id' => 6,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Kimya və materialşünaslıq',
            ]);
        }

        $model = Department::create([
            'id' => 7,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Aviasiya təhlükəsizliyi',
            ]);
        }

        $model = Department::create([
            'id' => 8,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Avianəqliyyat istehsalatı',
            ]);
        }



        $model = Department::create([
            'id' => 9,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Nəqliyyat mexanikası',
            ]);
        }


        $model = Department::create([
            'id' => 10,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Ali riyaziyyat',
            ]);
        }



        $model = Department::create([
            'id' => 11,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Kompüter sistemləri və proqramlaşdırma',
            ]);
        }




        $model = Department::create([
            'id' => 12,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Peşəkar ingilis dili',
            ]);
        }



        $model = Department::create([
            'id' => 13,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Ətraf mühitin aerokosmik monitorinqi',
            ]);
        }

        $model = Department::create([
            'id' => 14,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Aerokosmik informasiya sistemləri',
            ]);
        }


        $model = Department::create([
            'id' => 15,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Ümumi və tətbiqi fizika',
            ]);
        }


        $model = Department::create([
            'id' => 16,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Radioelektronika',
            ]);
        }

        $model = Department::create([
            'id' => 17,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Aerokosmik cihazlar',
            ]);
        }

        $model = Department::create([
            'id' => 18,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Energetika və avtomatika',
            ]);
        }


        $model = Department::create([
            'id' => 19,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'İqtisadiyyat',
            ]);
        }

        $model = Department::create([
            'id' => 20,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Menecment',
            ]);
        }

        $model = Department::create([
            'id' => 21,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Hüquq',
            ]);
        }

        $model = Department::create([
            'id' => 22,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Dil və ictimai fənlər',
            ]);
        }


        $model = Department::create([
            'id' => 23,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'İngilis dili',
            ]);
        }
    }
}
