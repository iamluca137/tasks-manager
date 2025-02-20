<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatCalendar extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'color',
        'order',
        'is_show',
    ];
}
