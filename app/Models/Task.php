<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description', 'due_date', 'user_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Relationships */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
