<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatCalendar extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'code',
        'name',
        'description',
        'color',
        'order',
        'is_show',
        'is_active',
    ];
}
