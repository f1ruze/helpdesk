<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('faculties')->delete();
        $model = Faculty::create([
            'id' => 1,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Hava nəqliyyatı fakültəsi',
            ]);
        }

        $model = Faculty::create([
            'id' => 2,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Nəqliyyat texnologiyaları fakültəsi',
                ]);
        }

        $model = Faculty::create([
            'id' => 3,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Aerokosmik fakültə',
            ]);
        }


        $model = Faculty::create([
            'id' => 4,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Fizika-texnologiya fakültəsi',
            ]);
        }

        $model = Faculty::create([
            'id' => 5,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'İqtisadiyyat və hüquq fakültəsi',
            ]);
        }



        $model = Faculty::create([
            'id' => 6,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'name' => 'Qiyabi fakültə',
            ]);
        }
    }
}
