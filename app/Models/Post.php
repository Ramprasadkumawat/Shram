<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table = 'owner_posts';

    protected $fillable = [
        'owner_id',
        'title',
        'description',
        'required_labours',
        'location',
        'start_date',
        'end_date',
        'work_type',
        'wage_per_day',
        'wage_per_hour',
        'status',
    ];

    // Relationships
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
