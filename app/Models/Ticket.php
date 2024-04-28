<?php

namespace App\Models;

use App\Traits\DocumentTrait;
use App\Traits\TranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory,TranslationTrait,DocumentTrait;

    protected $guarded = [];

    public $table = ['tickets'];

}
