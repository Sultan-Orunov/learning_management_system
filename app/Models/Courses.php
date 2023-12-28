<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function courseGoals(){
        return $this->hasMany(CourseGoal::class, 'course_id', 'id');
    }
}
