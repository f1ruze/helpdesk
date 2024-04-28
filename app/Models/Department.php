<?php

namespace App\Models;

use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Department extends Model
{
    use HasFactory,TranslationTrait;

    protected $guarded = [];
    public $with = ['translation'];

    public function translations()
    {
        return $this->hasMany(DepartmentTranslation::class);

    }
    public function translation()
    {
        return $this->hasOne(DepartmentTranslation::class)
            ->where('locale',Session::get('locale'));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
