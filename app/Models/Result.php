<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id',
        'first_result',
        'second_result',
        'third_result',
        'fourth_result',
        'general_result',
        'level_id'
    ];

    protected $appends = [
        'feedbacks'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function answers() 
    {
        return $this->hasMany(Answer::class);
    }

    protected function feedbacks(): Attribute
    {
        $result = $this;
        return Attribute::make(
            get: fn () => Feedback::where(function ($query) use ($result) {
                $query->where('result_number', 1);
                $query->where('min_note', '<=', $result->first_result);
                $query->where('max_note', '>=' , $result->first_result);
            })->orWhere(function ($query) use ($result) {
                $query->where('result_number', 2);
                $query->where('min_note', '<=', $result->second_result);
                $query->where('max_note', '>=' , $result->second_result);
            })->orWhere(function ($query) use ($result) {
                $query->where('result_number', 3);
                $query->where('min_note', '<=', $result->third_result);
                $query->where('max_note', '>=' , $result->third_result);
            })->orWhere(function ($query) use ($result) {
                $query->where('result_number', 4);
                $query->where('min_note', '<=', $result->fourth_result);
                $query->where('max_note', '>=' , $result->fourth_result);
            })->orderBy('result_number')->get()
        );
    }
}
