<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'information',
        'max_people',
        'start_date',
        'end_date',
        'is_visible'
    ];

    public function getEventDateAttribute($value)
    {
        return Carbon::parse($this->start_date)->format('Y年m月d日');
    }

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($this->start_date)->format('H時i分');
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($this->end_date)->format('H時i分');
    }
}
