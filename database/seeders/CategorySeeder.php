<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->delete();

        $model = Category::create([
            'id' => 1,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'hardware',
                'name' => 'Printer Problemləri'
            ]);
        }

        $model = Category::create([
            'id' => 2,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'hardware',
                'name'=>'Kompüter Qəzaları'
            ]);
        }

        $model = Category::create([
            'id' => 3,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'hardware',
                'name' =>'Şəbəkə Problemləri'
            ]);
        }


        $model = Category::create([
            'id' => 4,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'hardware',
                'name' =>'Saxlama Problemləri'
            ]);
        }

        $model = Category::create([
            'id' => 5,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'hardware',
                'name'=>'Fiziki zərər'
            ]);
        }



        $model = Category::create([
            'id' => 6,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'hardware',
                'name' => 'Avadanlıq Təkmilləşdirmələri',
            ]);
        }

        $model = Category::create([
            'id' => 7,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'software',
                'name' => 'Quraşdırma Problemləri',
            ]);
        }

        $model = Category::create([
            'id' => 8,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'software',
                'name' => 'Proqram Qəzaları',
            ]);
        }



        $model = Category::create([
            'id' => 9,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'software',
                'name' => 'Performans Məsələləri',
            ]);
        }


        $model = Category::create([
            'id' => 10,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'software',
                'name' => 'Uyğunluq Problemləri',
            ]);
        }

        $model = Category::create([
            'id' => 11,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'software',
                'name' => 'Təhlükəsizlik Problemləri',
            ]);
        }


        $model = Category::create([
            'id' => 12,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'software',
                'name' => 'Giriş/Qeydiyyat Problemləri',
            ]);
        }


        $model = Category::create([
            'id' => 13,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'type' => 'software',
                'name' => 'Konfiqurasiya Problemləri',
            ]);
        }


    }
}
